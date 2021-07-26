import { Component, OnInit } from '@angular/core';
import {NgbModal} from '@ng-bootstrap/ng-bootstrap';
import { ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';
import { JoueurService } from 'src/app/SERVICES/joueur/joueur.service';
import { OrganisateurService } from 'src/app/SERVICES/organisateur/organisateur.service';

@Component({
  selector: 'app-matche',
  templateUrl: './matche.component.html',
  styleUrls: ['./matche.component.css']
})
export class MatcheComponent implements OnInit {
  closeResult = '';
  listJoueur;
  equipes;
  constructor(private serviceOrganisateur: OrganisateurService, private serviceJoueur: JoueurService,
              private modalService: NgbModal) { }

  ngOnInit(): void {
    this.getAllJoueur();
  }
  getAllJoueur(){
    this.serviceJoueur.getAllJoueur().subscribe((data) => {
      this.listJoueur = data ['hydra:member'];
      console.log(this.listJoueur);
    });
  }
   /* --------------------- Liste des joueurs --------------------- */
   open(content) {
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
