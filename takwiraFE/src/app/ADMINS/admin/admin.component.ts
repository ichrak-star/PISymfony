import { Component, OnInit } from '@angular/core';
import {UserService} from '../../SERVICES/user/user.service';
import {User} from '../../ENTITIES/user';

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.css']
})
export class AdminComponent implements OnInit {
  modifDiv = true;
  listeUser;
  afficherAjout = true;
  afficherTable = false;
  public userModif: User = new User();
  constructor(private userservice: UserService) { }

  ngOnInit(): void {
    this.onreload();
  }
  delete(id){
    this.userservice.deleteUser(id).subscribe(() => {
      window.confirm('Voulez vous vraiment supprimé l"ulilisateur');
    });
  }
  onEdit(localUser: any){
    this.modifDiv = false;
    this.userModif = localUser;
    console.log(this.userModif);
  }
  updateUser(id, userModif){
    console.log('user id : ' + id);
    this.userservice.updateUser(id, userModif).subscribe(() => {
      alert('User Modifié avec success.....');
      this.modifDiv = true;
    });
  }
  annulerModification(){
    this.modifDiv = true;
  }
  onreload(){
    this.userservice.getAllUsers().subscribe((data) => {
      this.listeUser = data ['hydra:member'];
    });
  }
}
