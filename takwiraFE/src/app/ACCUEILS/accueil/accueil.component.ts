import {Component, OnInit } from '@angular/core';
import {OrganisateurService} from '../../SERVICES/organisateur/organisateur.service';
import {JoueurService} from '../../SERVICES/joueur/joueur.service';
import {NgbModal} from '@ng-bootstrap/ng-bootstrap';
import { ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.component.html',
  styleUrls: ['./accueil.component.css']
})
export class AccueilComponent implements OnInit {
  closeResult = '';
  listMatch;
  listJoueur;
  equipes;
  affiche = true;
  afficherAchatTicket = true;
  constructor(private serviceOrganisateur: OrganisateurService, private serviceJoueur: JoueurService,private modalService: NgbModal) { }

  ngOnInit(): void {
    this.getAllMatch();
    this.getAllJoueur();
  }
  afficher(){
    this.affiche = false;
  }
  getAllMatch(){
    this.serviceOrganisateur.getAllMatche().subscribe((data) => {
      this.listMatch = data ['hydra:member'];
    });
  }
  getAllJoueur(){
    this.serviceJoueur.getAllJoueur().subscribe((data) => {
      this.listJoueur = data ['hydra:member'];
      console.log(this.listJoueur);
    });
  }
  closeListeJoueur(){
    this.afficherAchatTicket = true;
  }
  acheterTicket(){
    this.afficherAchatTicket = false;
  }
  confirmerAchat(){
    this.afficherAchatTicket = true;
  }
  /* --------------------- Liste des joueurs --------------------- */
  open(content, matche) {
    this.equipes = matche ;
    this.modalService.open(content,   {size: 'xl'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult =  `Dismissed ${this.getDismissReason(reason)}`;
    });
  }
  private getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return `with: ${reason}`;
    }
  }
}
