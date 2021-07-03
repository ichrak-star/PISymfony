import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {FormBuilder, FormGroup} from '@angular/forms';

@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.component.html',
  styleUrls: ['./connexion.component.css']
})
export class ConnexionComponent implements OnInit {
  constructor( private router: Router,
              private formBuilder: FormBuilder) { }
  authForm: FormGroup;
  isSubmitted  =  false;
  liste;
  entreprise;
  idEnt = '';
  errorMessage = false;
  amil = document.getElementById('email');
  pwd = document.getElementById('password');
  role = document.getElementById('role');
  ngOnInit(): void {
    /* this.authForm  =  this.formBuilder.group({
       email: ['', Validators.required],
       password: ['', Validators.required]
     });
     this.serviceEntreprise.getEntreprise().subscribe((res) =>{
       this.liste = res;
     });
   }
   signIn(){
     this.isSubmitted = true;
     if ( this.liste.find(x => x.name === this.amil && x.password === this.pwd))
       {
         this.serviceEntreprise.signIn(this.authForm.value);
         this.router.navigate(['/EspaceEmployeur']);
       }
       else
         {
           return;
         }*/
  }
  loginEntreprise(login, pwd, role){
    if (login === 'takwira' && pwd === 'takwira' && role === 'organisateur' ){
      this.router.navigate(['/organisateur']);
    }else if (login === 'takwira' && pwd === 'takwira' && role === 'entreneur' ){
      this.router.navigate(['/entreneur']);
    }else if (login === 'takwira' && pwd === 'takwira' && role === 'responsableTicket' ){
      this.router.navigate(['/ticket']);
    }else if (login === 'takwira' && pwd === 'takwira' && role === 'gestionneurBlog' ){
      this.router.navigate(['/blog']);
    }
    /* this.serviceEntreprise.getEntreprise().subscribe((res) => {
       this.liste = res;
       if (this.liste.length !== 0){
         this.entreprise = this.liste.find(x => x.username === login && x.password === pwd);
         if ( this.entreprise != null && this.entreprise !== ''){
         localStorage.setItem('idEntreprise', this.entreprise.id);
         this.router.navigate(['/EspaceEmployeur']);
         }
         else {
           this.errorMessage = true;
         }
       }
       else {
         this.errorMessage = true;
       }
     });*/
  }


}
