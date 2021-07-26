import { Component, OnInit } from '@angular/core';
import {OrganisateurService} from '../../SERVICES/organisateur/organisateur.service';
import {NgForm} from '@angular/forms';
import {Staduim} from '../../ENTITIES/staduim';
import {Arbitre} from '../../ENTITIES/arbitre';
import {Team} from '../../ENTITIES/team';
import {Router} from '@angular/router';
import {Matche} from '../../ENTITIES/matche';
import {Ticket} from '../../ENTITIES/ticket';
import { UserService } from 'src/app/SERVICES/user/user.service';

@Component({
  selector: 'app-organisateur',
  templateUrl: './organisateur.component.html',
  styleUrls: ['./organisateur.component.css']
})
export class OrganisateurComponent implements OnInit {
  success = true;
  suppression = true;
  formEditUser = true;
  erreurValidationModifUser = true;
  listeUser;
  oneUser;
  searchedKeyword: any;
  searchedKeyword1: any;
  searchedKeyword2: any;
  searchedKeyword3: any;
  afficherAjout = true;
  afficherAjoutStade = true;
  afficherModifStade = true;
  afficherAjoutArbitre = true;
  erreurAjouterArbitre = true;
  afficherModifArbitre = true;
  afficherAjoutEquipe  = true;
  afficherModifEquipe  = true;
  erreurMemeEquipe = true;
  erreurAjouterMatch = true;
  afficherModifMatch = true;
  afficherTable = false;
  validation = true;
  validationAjoutTeam = true;
  listMatch;
  listeTeam;
  listStade;
  listArbitre;
  idOrganisateur;
  public matche: Matche = new Matche();
  public matcheModif: Matche = new Matche();
  public arbitre: Arbitre = new Arbitre();
  public arbitreModif: Arbitre = new Arbitre();
  public staduim: Staduim = new Staduim();
  public staduimModif: Staduim = new Staduim();
  public team: Team = new Team();
  public teamModif: Team = new Team();
  constructor(private serviceOrganisateur: OrganisateurService, private router: Router, private serviceUser: UserService) { }

  ngOnInit(): void {
    this.idOrganisateur = localStorage.getItem('organisateurKey');
    console.log('---ID----' + this.idOrganisateur);
    this.getOneOrganisateur();
    this.getListMatch();
    this.getListeStade();
    this.getListeArbitre();
    this.getListTeam();
  }
  /* ----------------------------------- Partie Match ----------------------------------- */
  ajouterMatch(){
    this.afficherAjout = false;
    this.erreurMemeEquipe = true;
    this.erreurAjouterMatch = true;
  }
  annulerAjoutMatch(){
    this.afficherAjout = true;
  }
  addMatch(matche: NgForm){
    this.matche.equipe1 = matche.form.value['equipe1'];
    this.matche.equipe2 = matche.form.value['equipe2'];
    this.matche.stade = matche.form.value['stade'];
    this.matche.arbitre = matche.form.value['arbitre'];
    this.matche.date =  matche.form.value['date'];
    this.matche.time = matche.form.value['time'];
    this.matche.result = '';
    if (this.matche.equipe1 === this.matche.equipe2){
      this.erreurMemeEquipe = false;
      this.erreurAjouterMatch = true;
    }
    else if (this.matche.equipe1 === '' || this.matche.equipe2 === '' || this.matche.stade === '' || this.matche.arbitre === ''
             || this.matche.date === '' || this.matche.time === ''){
      this.erreurAjouterMatch = false;
      this.erreurMemeEquipe = true;
    }
    else {
      this.serviceOrganisateur.addMatche(this.matche).subscribe(() => {
          this.afficherAjout = true;
          this.getListMatch();
          this.success = false;
          setTimeout(() => {
            this.success = true;
          }, 2000);
        });
    }
  }
  getListMatch(){
    this.serviceOrganisateur.getAllMatche().subscribe((data) => {
      this.listMatch = data ['hydra:member'] ;
    });
  }
  supprimerMatch(id){
    if (confirm(' supprission du stade id = ' + id)) {
      this.serviceOrganisateur.deleteMatche(id).subscribe(() => {
        this.getListMatch();
        this.suppression = false;
        setTimeout(() => {
          this.suppression = true;
        }, 2000);
      });
    }
  }
  enEditMatch(match){
    this.afficherModifMatch = false;
    this.matcheModif = match;
    this.afficherAjout = true;
  }
  ModifierMatch(id, match){
    if (this.matcheModif.equipe1 === this.matcheModif.equipe2){
      this.erreurMemeEquipe = false;
      this.erreurAjouterMatch = true;
    } else if (this.matcheModif.equipe1 === '' || this.matcheModif.equipe2 === '' || this.matcheModif.stade === '' || this.matcheModif.arbitre === ''
      || this.matcheModif.date === '' || this.matcheModif.time === ''){
      this.erreurAjouterMatch = false;
      this.erreurMemeEquipe = true;
    }
    else {
      this.serviceOrganisateur.updateMatche(id, match).subscribe(() => {
        this.getListMatch();
        this.afficherModifMatch = true;
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2000);
      });
    }
  }
  annulerMOdifMatch(){
    this.afficherModifMatch = true;
  }
  /* ----------------------------------- Partie team ----------------------------------- */
  afficherFormEquipe(){
    this.afficherAjoutEquipe  = false;
    this.validationAjoutTeam = true;
  }
  annulerTeam(){
    this.afficherAjoutEquipe = true;
  }
  getListTeam(){
    this.serviceOrganisateur.getAllTeam().subscribe((data) => {
      this.listeTeam = data ['hydra:member'];
    });
  }
  ajouterEquipe(t: NgForm){
    this.team.teamName = t.form.value['teamName'];
    this.team.nationality = t.form.value['nationality'];
    if ((this.team.teamName === '') || (this.team.nationality === '')  ){
      this.validationAjoutTeam = false;
    } else {
      this.serviceOrganisateur.addOneTeam(this.team).subscribe(() => {
        this.afficherAjoutEquipe = true;
        this.getListTeam();
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2000);
      });
    }
  }
  enEditTeam(team: any){
    this.teamModif = team;
    this.afficherModifEquipe = false;
  }
  editEquipe(id, team){
    this.serviceOrganisateur.updateTeam(id, team).subscribe(() => {
      this.afficherModifEquipe = true;
      this.success = false;
      setTimeout(() => {
        this.success = true;
      }, 2000);
    });
  }
  annulerModifTeam(){
    this.afficherModifEquipe = true;
  }
  deleteOneTeam(id){
    if (confirm('Voulez vous vraiment supprimé l"équipe ?')) {
      this.serviceOrganisateur.deleteTeam(id).subscribe(() => {
        this.getListTeam();
        this.suppression = false;
        setTimeout(() => {
          this.suppression = true;
        }, 2000);
      });
    }
  }
  /* ----------------------------------- Partie Stade ----------------------------------- */
  afficherFormStade(){
    this.afficherAjoutStade = false;
  }
  addStade(f: NgForm){
    console.log(f.value);
    this.serviceOrganisateur.addStade(f.value).subscribe(() => {
      this.getListeStade();
      this.success = false;
      setTimeout(() => {
        this.success = true;
      }, 2000);
    });
  }
  getListeStade(){
    this.serviceOrganisateur.getAllStade().subscribe((data) => {
      this.listStade = data ['hydra:member'];
      console.log('----------------------');
      console.log(this.listStade);
    });
  }
  enEditStade(stade){
    this.afficherModifStade = false;
    this.staduimModif = stade;
  }
  editStade(id, stade){
    this.serviceOrganisateur.updateStade(id, stade ).subscribe(() => {
      this.afficherModifStade = true;
      this.success = false;
      setTimeout(() => {
        this.success = true;
      }, 2000);
    });
  }
  supprimerStade(id){
    if (confirm(' supprission du stade!!!!')) {
      this.serviceOrganisateur.deleteStade(id).subscribe(() => {
        this.getListeStade();
        this.suppression = false;
        setTimeout(() => {
          this.suppression = true;
        }, 2000);
      });
    }
  }
  annulerStade(){
    this.afficherModifStade = true;
    this.afficherAjoutStade = true;
  }
  /* ----------------------------------- Partie Arbitre ----------------------------------- */
  afficherFormArbitre(){
    this.afficherAjoutArbitre = false;
    this.erreurAjouterArbitre = true;
  }
  anuulerAjoutArbitre(){
    this.afficherAjoutArbitre = true;
  }
  getListeArbitre(){
    this.serviceOrganisateur.getAllArbitre().subscribe((data) => {
      this.listArbitre = data ['hydra:member'];
      console.log('----------------------');
      console.log(this.listArbitre);
    });
  }
  addArbitre(arbitre: NgForm){
    this.arbitre.name = arbitre.form.value['name'];
    this.arbitre.lastName = arbitre.form.value['lastName'];
    if ((this.arbitre.name === '') || (this.arbitre.lastName  === '') ) {
      this.erreurAjouterArbitre = false;
    }else {
      this.serviceOrganisateur.addArbitre(this.arbitre).subscribe(() => {
        console.log(this.arbitre);
        this.getListeArbitre();
        this.afficherAjoutArbitre = true;
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2000);
      });
    }
  }
  supprimerArbitre(id){
    if (confirm(' Voulez vous vraiment supprimer l"arbitre ?')) {
      this.serviceOrganisateur.deleteArbitre(id).subscribe(() => {
        this.getListeArbitre();
        this.suppression = false;
        setTimeout(() => {
          this.suppression = true;
        }, 2000);
      });
    }
  }
  enEditArbitre(arbitre){
    this.arbitreModif = arbitre;
    this.afficherModifArbitre = false;
  }
  editArbitre(id, arbitreModif){
    this.serviceOrganisateur.updateArbitre(id, arbitreModif ).subscribe(() => {
      this.afficherModifArbitre = true;
      this.getListeArbitre();
      this.success = false;
      setTimeout(() => {
        this.success = true;
      }, 2000);
    });
  }
  anuulerModifArbitre(){
    this.afficherModifArbitre = true;
  }

  /* ----------------------------------- Connexion ------------------------------------------ */
  logoutOrganisateur(){
    localStorage.removeItem('organisateurKey');
    this.router.navigate(['']);
  }
  getOneOrganisateur(){
    this.idOrganisateur = localStorage.getItem('organisateurKey');
    this.serviceUser.getAllUsers().subscribe((res) => {
      this.listeUser = res ['hydra:member'];
      this.oneUser = this.listeUser.find(x => x.id == this.idOrganisateur);
      if (this.oneUser == undefined){
        alert('user not found');
      }
    });
    console.log('---USER----' , this.listeUser);
    console.log('---ID2----' + this.idOrganisateur);
    console.log('---USER2----' + this.oneUser);
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
