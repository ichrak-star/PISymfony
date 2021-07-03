import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-entreneur',
  templateUrl: './entreneur.component.html',
  styleUrls: ['./entreneur.component.css']
})
export class EntreneurComponent implements OnInit {
  btnAjouterTeam = false;
  logo = true;
  afficher = true;
  afficherteam = true;
  constructor() { }

  ngOnInit(): void {
  }
  ajouterJoueur(){
    this.afficher = false;
    this.afficherteam = true;
  }
  ajouterTeam(){
    this.afficherteam = false;
    this.afficher = true;
  }
  addOrganisater(){
    this.afficher = true;
  }
  addteam(){
    this.logo = false;
    this.afficherteam = true;
    this.btnAjouterTeam = true;
  }
  annulerTeam(){
    this.logo = true;
    this.afficherteam = true;
  }
  deleteTeam(){
    this.btnAjouterTeam = false;
    this.logo = true;
  }

}
