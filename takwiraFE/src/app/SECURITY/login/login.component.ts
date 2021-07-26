import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {createLocalizeStatements} from '@angular/compiler/src/render3/view/i18n/localize_utils';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  validation = true;
  deconnected = true;
  constructor(private  router: Router) { }

  ngOnInit(): void {
    this.deconnected = false;
    setTimeout(() => {
      this.deconnected = true;
    }, 3500);
  }
  signIn(username, pwd){
      if (username === 'admin' && pwd === 'admin*2020'){
        this.router.navigate(['/admin']);
        localStorage.setItem('token', 'admin');
      }else if (username === '' && pwd === '' ){
        this.validation = false;
      }
  }
}
