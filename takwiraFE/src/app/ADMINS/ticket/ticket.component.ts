import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import {TicketService} from '../../SERVICES/ticket/ticket.service';
import {OrganisateurService} from '../../SERVICES/organisateur/organisateur.service';
import {Ticket} from '../../ENTITIES/ticket';
import {NgForm} from '@angular/forms';
import {Matche} from '../../ENTITIES/matche';
import {NgbModal} from '@ng-bootstrap/ng-bootstrap';
import { ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';
import { UserService } from 'src/app/SERVICES/user/user.service';

import {ElementRef, ViewChild } from '@angular/core';
import jsPDF from 'jspdf';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;
import htmlToPdfmake from 'html-to-pdfmake';
import * as XLSX from 'xlsx';

@Component({
  selector: 'app-ticket',
  templateUrl: './ticket.component.html',
  styleUrls: ['./ticket.component.css']
})
export class TicketComponent implements OnInit {
  success = true;
  suppression = true;
  formEditUser = true;
  erreurValidationModifUser = true;
  listeUser;
  oneUser;
  idResponsableTicket;
  closeResult = '';
  searchedKeyword: any;
  listeTicket;
  listMatch;
  oneMatch: any;
  oneMatchModif: any;
  afficher = true;
  afficherTable = false;
  public tichet: Ticket = new Ticket();
  public tichetModif: Ticket = new Ticket();
  title = 'htmltopdf';
  @ViewChild('pdfTable') pdfTable: ElementRef;
  fileName = 'Tickets.xlsx';
  constructor(private serviceticket: TicketService, private serviceOrganisateur: OrganisateurService,
              private modalService: NgbModal, private serviceUser: UserService, private router: Router) { }

  ngOnInit(): void {
    this.getOneOrganisateur();
    this.getListTicket();
    this.getListMatch();
  }
  ajouterOrganisateur(){
    this.afficherTable = true;
    this.afficher = false;
  }
  ajouterTickets(){
    this.afficher = true;
    this.afficherTable = false;
  }
  addTicket(tikets: NgForm){
    this.serviceOrganisateur.getAllMatche().subscribe((data) => {
      this.listMatch = data ['hydra:member'] ;
      this.oneMatch = this.listMatch.find(x => x.id == tikets.form.value['matche']);
      console.log('ID matche = ' + tikets.form.value['matche']);
      this.tichet.matche = this.oneMatch ;
      console.log('Matche = ' + this.tichet.matche);
      this.tichet.number = `${tikets.form.value['number']}`;
      this.tichet.typeTicket = tikets.form.value['typeTicket'];
      console.log('---------Ajout-----------');
      console.log(this.tichet);
      this.serviceticket.addTicket(this.tichet).subscribe(() => {
        this.afficher = true;
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2500);
      });
    });
  }
  getListTicket(){
    this.serviceticket.getAllTicket().subscribe((data) => {
      this.listeTicket = data ['hydra:member'];
      console.log(this.listeTicket);
    });
  }
  getListMatch(){
    this.serviceOrganisateur.getAllMatche().subscribe((data) => {
      this.listMatch = data ['hydra:member'] ;
    });
  }
  supprimerTicket(id){
    if(confirm('supprission de la ticket')){
      this.serviceticket.deleteTicket(id).subscribe(() => {
        this.getListTicket();
        this.getListMatch();
        this.suppression = false;
        setTimeout(() => {
          this.suppression = true;
        }, 2000);
      });
    }
  }

  /* ----------------------  Update ticket  ---------------------- */
  onEditTicket(modifierTicket, ticket) {
    this.tichetModif = ticket ;
    //this.tichetModif.matche = ticket.matche ;
    this.modalService.open(modifierTicket,   {size: 'lg'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult =  `Dismissed ${this.getDismissReason(reason)}`;
    });
  }
  editTicket(id, tichet){
      this.serviceticket.updateTicket(id, tichet).subscribe(() => {
        this.modalService.dismissAll(this.getDismissReason(ModalDismissReasons.ESC));
        this.getListTicket();
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2500);
      });
  }
  /* ----------------------  Close modal  ---------------------- */
  private getDismissReason(reason: any): string {
      if (reason === ModalDismissReasons.ESC) {
        this.getListTicket();
        return 'by pressing ESC';
      } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
        this.getListTicket();
        return 'by clicking on a backdrop';
      } else {
        this.getListTicket();
        return `with: ${reason}`;
      }
  }
  /* -------------------------   pdf   ------------------------- */
  public downloadAsPDF() {
    const doc = new jsPDF();
    const pdfTable = this.pdfTable.nativeElement;
    const html = htmlToPdfmake(pdfTable.innerHTML);
    const documentDefinition = { content: html };
    pdfMake.createPdf(documentDefinition).open();
  }
  /* ------------------------   excel  ------------------------- */
  exportexcel(): void {
    const elements = document.getElementById('pdfTable');
    const wc: XLSX.WorkSheet = XLSX.utils.table_to_sheet(elements);
    const wb: XLSX.WorkBook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet( wb, wc, 'Sheet1');
    XLSX.writeFile(wb, this.fileName);
  }
  /* --------------------------- logout ----------------------- */
  logoutTicket(){
    localStorage.removeItem('responsableTicketKey');
    this.router.navigate(['']);
  }
  getOneOrganisateur(){
    this.idResponsableTicket = localStorage.getItem('responsableTicketKey');
    this.serviceUser.getAllUsers().subscribe((res) => {
      this.listeUser = res ['hydra:member'];
      this.oneUser = this.listeUser.find(x => x.id == this.idResponsableTicket);
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
