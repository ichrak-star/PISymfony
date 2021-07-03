import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-organisateur',
  templateUrl: './organisateur.component.html',
  styleUrls: ['./organisateur.component.css']
})
export class OrganisateurComponent implements OnInit {
  afficherAjout = true;
  afficherTable = false;
  constructor() { }

  ngOnInit(): void {
  }
  ajouterMatch(){
    this.afficherTable = true;
    this.afficherAjout = false;
  }
  addOrganisater(){
    this.afficherTable = false;
    this.afficherAjout = true;
  }

}
