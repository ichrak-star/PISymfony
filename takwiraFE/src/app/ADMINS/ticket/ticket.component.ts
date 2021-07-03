import { Component, OnInit } from '@angular/core';
import {TicketService} from '../../SERVICES/ticket/ticket.service';

@Component({
  selector: 'app-ticket',
  templateUrl: './ticket.component.html',
  styleUrls: ['./ticket.component.css']
})
export class TicketComponent implements OnInit {
  listeTicket;
  afficher = true;
  afficherTable = false;
  constructor(private serviceticket: TicketService) { }

  ngOnInit(): void {
    this.serviceticket.getAllTicket().subscribe((data) => {
      this.listeTicket = data ['hydra:member'];
    });
  }
  ajouterOrganisateur(){
    this.afficherTable = true;
    this.afficher = false;
  }
  ajouterTickets(){
    this.afficher = true;
    this.afficherTable = false;
  }
  onGetData(){
  }
  addTicket(f){
   /* return this.serviceTicket.addTicket(f).subscribe(() => {
      alert('User added with success');
      console.log('User added !');
    });*/
  }


}
