import { Component, OnInit } from '@angular/core';
import {NgForm} from '@angular/forms';
import {UserService} from '../../SERVICES/user/user.service';
import {EntreneurService} from '../../SERVICES/entreneur/entreneur.service';
import {JoueurService} from '../../SERVICES/joueur/joueur.service';
import {Joueur} from '../../ENTITIES/joueur';
import {Router} from '@angular/router';
import {Team} from '../../ENTITIES/team';

@Component({
  selector: 'app-entreneur',
  templateUrl: './entreneur.component.html',
  styleUrls: ['./entreneur.component.css']
})
export class EntreneurComponent implements OnInit {
  success = true;
  suppression = true;
  formEditUser = true;
  erreurValidationModifUser = true;
  btnAjouterTeam = false;
  logo = true;
  afficher = true;
  listeJoueur;
  idEntreneur;
  listeTeam;
  listeUser;
  oneUser;
  hideFormulaireModification = true;
  validationformAjoutJoueur = true;
  constructor(private serviceUser: UserService, private serviceEntreneur: EntreneurService,
              private servicejoueur: JoueurService, private router: Router) { }
  public joueur: Joueur = new Joueur();
  public joueurModif: Joueur = new Joueur();
  public teamAjout: Team = new Team();

  ngOnInit(): void {
    this.getAllTeam();
    this.getAlljoueur();
    this.getOneOrganisateur();
  }
  /* ----------------------------- Partie Joueur ---------------------------------- */
  getAlljoueur(){
    this.servicejoueur.getAllJoueur().subscribe((data) => {
      this.listeJoueur = data ['hydra:member'];
      console.log(this.listeJoueur);
    });
  }
  ajouterJoueur(){
    if (this.listeJoueur.length < 11){
      this.afficher = false;
      this.validationformAjoutJoueur = true;
    }else {
      alert(' 11 joueurs maximun pour l"équipe !.....');
    }
  }
  addJoueur(j: NgForm){
    this.joueur.name = j.form.value['name'];
    this.joueur.lastName = j.form.value['lastName'];
    this.joueur.size = j.form.value['size'];
    this.joueur.weight = j.form.value['weight'];
    this.joueur.statut = true;
    this.joueur.level = j.form.value['level'];
    this.teamAjout.id = j.form.value['team'];
    this.joueur.team = this.teamAjout ;
    console.log('Notre team : ' + this.joueur.team);
    if ((this.joueur.name === '') || (this.joueur.lastName  === '') || (this.joueur.size === '') || (this.joueur.weight === '') ||
        (this.joueur.level === '') ){
      this.validationformAjoutJoueur = false;
    }else {
      this.servicejoueur.addJoueur(this.joueur).subscribe(() => {
        console.log(this.joueur);
        this.afficher = true;
        this.getAlljoueur();
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2000);
      });
    }
  }
  deleteJoueur(id){
    if (confirm(' supprission du joueur !!!!')){
      this.servicejoueur.deleteJoueur(id).subscribe(() => {
        this.getAlljoueur();
        this.suppression = false;
        setTimeout(() => {
          this.suppression = true;
        }, 2000);
      });
    }
  }
  onEditJoueur(joueur: any){
    this.hideFormulaireModification = false;
    this.joueurModif = joueur ;
  }
  updateJoueur(id: any, joueur: any){
    this.servicejoueur.updateJ(id, joueur).subscribe(() => {
      this.hideFormulaireModification = true;
      this.success = false;
      setTimeout(() => {
        this.success = true;
      }, 2000);
    });
  }
  annulerModification(){
    this.getAlljoueur();
    this.hideFormulaireModification = true;
  }

  /* ----------------------------- Partie Team ---------------------------------- */
  getAllTeam(){
    this.serviceEntreneur.getAllTeam().subscribe((data) => {
      this.listeTeam = data ['hydra:member'] ;
    });
  }
  annulerAjout(){
    this.afficher = true;
  }
  /* ----------------------------- Connexion ---------------------------------- */
  logoutEntreneur(){
    localStorage.removeItem('entreneurKey');
    this.router.navigate(['']);
  }
  getOneOrganisateur(){
    this.idEntreneur = localStorage.getItem('entreneurKey');
    this.serviceUser.getAllUsers().subscribe((res) => {
      this.listeUser = res ['hydra:member'];
      this.oneUser = this.listeUser.find(x => x.id == 2);
      if (this.oneUser == undefined){
        alert('user not found');
      }
    });
  }
  onEditUser(){
    this.formEditUser = false;
  }
  annulerEdit(){
    this.formEditUser = true;
  }
  editUser(id, userModif){
    if (userModif.name === '' || userModif.lastname === '' || userModif.password === '' || userModif.email === '' || userModif.adress === '' ){
      this.erreurValidationModifUser = false;
    }else {
      this.serviceUser.updateUser(id, userModif).subscribe(() => {
        this.erreurValidationModifUser = true;
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2500);
      });
      this.formEditUser = true;
    }
  }

}
