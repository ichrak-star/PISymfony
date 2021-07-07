import { Component, OnInit } from '@angular/core';
import {OrganisateurService} from '../../SERVICES/organisateur/organisateur.service';
import {NgForm} from '@angular/forms';
import {Staduim} from '../../ENTITIES/staduim';
import {Arbitre} from '../../ENTITIES/arbitre';
import {Team} from '../../ENTITIES/team';

@Component({
  selector: 'app-organisateur',
  templateUrl: './organisateur.component.html',
  styleUrls: ['./organisateur.component.css']
})
export class OrganisateurComponent implements OnInit {
  success = true;
  afficherAjout = true;
  afficherAjoutStade = true;
  afficherModifStade = true;
  afficherAjoutArbitre = true;
  erreurAjouterArbitre = true;
  afficherModifArbitre = true;
  afficherAjoutEquipe  = true;
  afficherModifEquipe  = true;
  afficherTable = false;
  validation = true;
  validationAjoutTeam =true;
  listeTeam;
  listStade;
  listArbitre;
  public arbitre: Arbitre = new Arbitre();
  public arbitreModif: Arbitre = new Arbitre();
  public staduim: Staduim = new Staduim();
  public staduimModif: Staduim = new Staduim();
  public team: Team = new Team();
  public teamModif: Team = new Team();
  constructor(private serviceOrganisateur: OrganisateurService) { }

  ngOnInit(): void {
    this.getListTeam();
    this.getListeStade();
    this.getListeArbitre();
  }
  /* ----------------------------------- Partie Match ----------------------------------- */
  ajouterMatch(){
    this.afficherTable = true;
    this.afficherAjout = false;
  }
  addOrganisater(){
    this.afficherTable = false;
    this.afficherAjout = true;
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
    if (confirm('Voulez vous vraiment supprimé l"équipe ?')){
      this.serviceOrganisateur.deleteTeam(id).subscribe(() => {
        this.getListTeam();
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
}
