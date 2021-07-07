import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {UserService} from '../../SERVICES/user/user.service';

@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.component.html',
  styleUrls: ['./connexion.component.css']
})
export class ConnexionComponent implements OnInit {
  constructor( private serviceUser: UserService, private router: Router, private formBuilder: FormBuilder) { }
  authForm: FormGroup;
  isSubmitted  =  false;
  listeUser;
  user;
  idEnt = '';
  connexionForm = true;
  errorMessage = false;
  email = document.getElementById('email');
  pwd = document.getElementById('password');
  role = document.getElementById('role');
  ngOnInit(): void {
     this.authForm  =  this.formBuilder.group({
       email: ['', Validators.required],
       password: ['', Validators.required],
       role: ['', Validators.required]
     });
     this.serviceUser.getAllUsers().subscribe((res) => {
       this.listeUser = res;
     });
   }
   /*signIn(email, pwd, role){
     this.isSubmitted = true;
     if ( this.listeUser.findElement(x => x.email === this.email && x.password === this.pwd && x.role === this.role) )
       {
           this.router.navigate(['/' + role ]);
       //  this.serviceUser.signIn(this.authForm.value);
       }
       else
         {
           this.connexionForm = false;

         }
  }*/
  signIn(email, pwd, role){
    if (email === 'takwira' && pwd === 'takwira' && role === 'organisateur' ){
      this.router.navigate(['/organisateur']);
    }else if (email === 'takwira' && pwd === 'takwira' && role === 'entreneur' ){
      this.router.navigate(['/entreneur']);
    }else if (email === 'takwira' && pwd === 'takwira' && role === 'responsableTicket' ){
      this.router.navigate(['/ticket']);
    }else if (email === 'takwira' && pwd === 'takwira' && role === 'gestionneurBlog' ){
      this.router.navigate(['/blog']);
    }
     /*this.serviceUser.getAllUsers().subscribe((res) => {
       this.listeUser = res;
       if (this.listeUser.length !== 0){
         this.user = this.listeUser.find(x => x.email === email && x.password === pwd && x.role === role);
         if ( this.user != null && this.user !== ''){
         localStorage.setItem('idUser', this.user.id);
         this.router.navigate(['/admin']);
         }
         else {
           this.connexionForm = false;
         }
       }
       else {
         this.connexionForm = false;
       }
     });*/
  }


}
