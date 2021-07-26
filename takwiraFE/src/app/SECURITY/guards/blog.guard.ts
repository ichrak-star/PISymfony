import { Injectable } from '@angular/core';
import {CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router} from '@angular/router';
import { Observable } from 'rxjs';
import {AuthService} from '../serviceGuards/auth.service';

@Injectable({
  providedIn: 'root'
})
export class BlogGuard implements CanActivate {
  constructor(private authService: AuthService, private router: Router) {
  }
  canActivate() {
    if (this.authService.isLoggedInBlog()){
      return true;
    }
    else{
      this.router.navigate(['connexion']);
      alert('vous êtes déconnecté....');
      return false;
    }
  }
}
