import { Component, OnInit } from '@angular/core';
import {BlogService} from '../../SERVICES/blog/blog.service';
import {NgForm} from '@angular/forms';
import {Publication} from '../../ENTITIES/publication';
import {Router} from '@angular/router';
import {Commentaire} from '../../ENTITIES/commentaire';
import { UserService } from 'src/app/SERVICES/user/user.service';

import {ElementRef, ViewChild } from '@angular/core';
import jsPDF from 'jspdf';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;
import htmlToPdfmake from 'html-to-pdfmake';
import * as XLSX from 'xlsx';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {
  success = true;
  suppression = true;
  formEditUser = true;
  erreurValidationModifUser = true;
  listeUser;
  oneUser;
  idBlog;
  searchedKeyword: any;
  listPublication;
  afficherFormPublication = true;
  afficherModifPublication = true;
  validationformAjoutPub = true;
  public pub: Publication = new Publication();
  public pubModif: Publication = new Publication();
  validation = true;
  title = 'htmltopdf';
  @ViewChild('pdfTable') pdfTable: ElementRef;
  fileName = 'Blog.xlsx';
  constructor(private router: Router, private serviceBlog: BlogService, private serviceUser: UserService ) { }

  ngOnInit(): void {
    this.afficherFormPublication = true;
    this. getOneOrganisateur();
    this.getListePublication();
  }

  getListePublication(){
    this.serviceBlog.getAllPublication().subscribe((data) => {
      this.listPublication = data ['hydra:member'] ;
    });
  }
  afficherFormPub(){
    this.afficherFormPublication = false;
  }
  annulerPublication(){
    this.afficherFormPublication = true;
  }
 addPub(f: NgForm){
    this.pub.contenuePub = f.form.value['contenuePub'];
    this.pub.nbrCommentaire = 0;
    this.pub.photo = f.form.value['photo'];
    this.pub.videoPub =  f.form.value['videoPub'];

    if (this.pub.contenuePub === '' ){
      console.log('content must be not null');
    }
    else{
      this.serviceBlog.addPublication(this.pub).subscribe(() => {
        alert('Publication added.....');
        this.getListePublication();
        this.afficherFormPublication = true;
      });
    }
  }
  deletePub(id){
    this.serviceBlog.deletePublication(id).subscribe( () => {
      alert('Publication deleted with succeed.....');
      this.getListePublication();
    });
  }
  onEditPublication(pub){
    this.pubModif = pub;
    this.afficherModifPublication = false;
    this.afficherFormPublication = true;
  }
  annulerModifPublication(){
    this.afficherModifPublication = true;
  }
  updatePub(pubModif, id){
    if (this.pub.contenuePub === '') {
      console.log('content must be not null');
    }
    else{
      this.serviceBlog.updatePublication(id, pubModif).subscribe(() => {
        this.afficherModifPublication = true;
        this.success = false;
        setTimeout(() => {
          this.success = true;
        }, 2500);
      });
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
  /* -------------------------- Connexion ----------------------- */
  logoutBlog(){
    localStorage.removeItem('gestionneurBlogtKey');
    this.router.navigate(['']);
  }
  getOneOrganisateur(){
    this.idBlog = localStorage.getItem('gestionneurBlogtKey');
    this.serviceUser.getAllUsers().subscribe((res) => {
      this.listeUser = res ['hydra:member'];
      this.oneUser = this.listeUser.find(x => x.id == this.idBlog);
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

