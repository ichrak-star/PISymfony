import { Component, OnInit } from '@angular/core';
import {NgForm} from '@angular/forms';
import {UserService} from '../../SERVICES/user/user.service';
import {EntreneurService} from '../../SERVICES/entreneur/entreneur.service';
import {JoueurService} from '../../SERVICES/joueur/joueur.service';
import {Joueur} from '../../ENTITIES/joueur';

@Component({
  selector: 'app-entreneur',
  templateUrl: './entreneur.component.html',
  styleUrls: ['./entreneur.component.css']
})
export class EntreneurComponent implements OnInit {
  success = true;
  deleteitem = true;
  btnAjouterTeam = false;
  logo = true;
  afficher = true;
  listeJoueur;
  listeTeam;
  hideFormulaireModification = true;
  validationformAjoutJoueur = true;
  constructor(private serviceUser: UserService, private serviceEntreneur: EntreneurService,
              private servicejoueur: JoueurService) { }
  public joueur: Joueur = new Joueur();
  public joueurModif: Joueur = new Joueur();

  ngOnInit(): void {
    this.getAllTeam();
    this.getAlljoueur();
  }
  /* ----------------------------- Partie Joueur ---------------------------------- */
  getAlljoueur(){
    this.servicejoueur.getAllJoueur().subscribe((data) => {
      this.listeJoueur = data ['hydra:member'];
      console.log(this.listeJoueur);
    });
  }
  ajouterJoueur(){
    if (this.listeJoueur.length < 10){
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
    this.joueur.team = j.form.value['team'];
    console.log('id team : ' + this.joueur.team);
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
        this.deleteitem = false;
        setTimeout(() => {
          this.deleteitem = true;
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


}
