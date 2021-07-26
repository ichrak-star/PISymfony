import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {UserService} from '../../SERVICES/user/user.service';
import {User} from '../../ENTITIES/user';
import {NgForm} from '@angular/forms';

@Component({
  selector: 'app-compte',
  templateUrl: './compte.component.html',
  styleUrls: ['./compte.component.css']
})
export class CompteComponent implements OnInit {
  validation = true;
  public user: User = new User();
  constructor( private router: Router, private serviceUser: UserService) { }

  ngOnInit(): void {
  }
  addUser(f: NgForm){
    this.user.name = f.form.value['name'];
    this.user.lastname = f.form.value['lastname'];
    this.user.email = f.form.value['email'];
    this.user.password = f.form.value['password'];
    this.user.adress = f.form.value['adress'];
    this.user.role = f.form.value['role'];
    if ((this.user.name === '') || (this.user.lastname === '') || (this.user.email === '') || (this.user.password === '') ||
      (this.user.adress === null) || (this.user.role === null) ){
      this.validation = false;
    } else {
      this.serviceUser.addUser(this.user).subscribe(() => {
        alert('User added.....');
        this.validation = true;
        this.router.navigate(['/loginEmployeur']);
      });
    }
  }

}
