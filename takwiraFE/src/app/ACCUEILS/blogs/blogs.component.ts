import { Commentaire } from './../../ENTITIES/commentaire';
import { Pub } from './../../ENTITIES/pub';
import { Component, OnInit } from '@angular/core';
import {BlogService} from '../../SERVICES/blog/blog.service';
import {Publication} from '../../ENTITIES/publication';
import {NgForm} from '@angular/forms';

@Component({
  selector: 'app-blogs',
  templateUrl: './blogs.component.html',
  styleUrls: ['./blogs.component.css']
})
export class BlogsComponent implements OnInit {
  listPublication;
  listCommentaire;
  formecommentaire = true;
  formeModifcommentaire =true;
  public pub: Publication = new Publication();
  public com: Commentaire = new Commentaire();
  constructor(private serviceBlog: BlogService) { }

  ngOnInit(): void {
    this.getListePublication();
    this.getListeCommentaire();
  }
  getListePublication(){
    this.serviceBlog.getAllPublication().subscribe((data) => {
      this.listPublication = data ['hydra:member'] ;
    });
  }
  getListeCommentaire(){
    this.serviceBlog.getAllCommentaire().subscribe((data) =>{
      this.listCommentaire = data ['hydra:member'] ;
    })
  }
  afficherFormCommentaire(p: Publication){
    this.formecommentaire = false ;
    this.pub = p;

  }
  afficherFormModifCommentaire(c: Commentaire){
    this.formeModifcommentaire = false ;
    this.com = c;

  }
  cacherFormCommentaire(){
    this.formecommentaire = true;
  }
  cacherFormModifCommentaire(){
    this.formeModifcommentaire = true;
  }
  ajouerComment(f: NgForm ){
    if(f.form.value['comment'] === ''){
      alert('il faut inserer une commentaire...');
        console.log('Merci d inserer votre commentaire !!!');
    }else{
    this.formecommentaire = true;
    let publication:Pub = new Pub();
     publication.contenuePub=this.pub.contenuePub;
    publication.videoPub=this.pub.videoPub;
    publication.photo=this.pub.photo;
    publication.nbrCommentaire=this.pub.nbrCommentaire;
    this.com.publications = publication;
    console.log(''+this.pub.contenuePub);
    if((f.form.value['name']==='')&&(f.form.value['name']==='')){
        this.com.name="Anonymous";
    }else{
      this.com.name =  f.form.value['name'];
      this.com.lastname =  f.form.value['lastname'];;
    }
    this.com.contenue = f.form.value['comment'];
      this.serviceBlog.addCommentaire(this.com).subscribe(() => {
      alert('Comment added.....');
      this.getListePublication();
      this.getListeCommentaire();
    });
    this.pub.id=this.pub.id+1;
    this.pub.nbrCommentaire=1;
    this.serviceBlog.updatePublication(this.pub.id,this.pub).subscribe();}
  }
  deleteCom(c: Commentaire){

    c.publications.nbrCommentaire=c.publications.nbrCommentaire-1;
    this.serviceBlog.updatePublication(c.publications.id,c.publications).subscribe();
    this.serviceBlog.deleteCommentaire(c.id).subscribe(()=>{
    alert('Comment deleted.......');
    this.getListePublication();
    this.getListeCommentaire();
});

  }
  updateComment(r: NgForm){

    if(r.form.value['content'] === '')
    console.log('Merci de remplir votre nouveau commentaire');
else{
this.com.contenue=r.form.value['content'];
this.serviceBlog.updateCommentaire(this.com.id,this.com).subscribe(()=>{
alert('Comment updated.......');
this.getListePublication();
    this.getListeCommentaire();
});}
  }
}
