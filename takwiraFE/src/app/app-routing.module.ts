import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {AccueilComponent} from './ACCUEILS/accueil/accueil.component';
import {EntreneurComponent} from './ADMINS/entreneur/entreneur.component';
import {BlogComponent} from './ADMINS/blog/blog.component';
import {OrganisateurComponent} from './ADMINS/organisateur/organisateur.component';
import {ConnexionComponent} from './ACCUEILS/connexion/connexion.component';
import {NotFoundComponent} from './ACCUEILS/not-found/not-found.component';
import {CompteComponent} from './ACCUEILS/compte/compte.component';
import {TicketComponent} from './ADMINS/ticket/ticket.component';
import {AdminComponent} from './ADMINS/admin/admin.component';
import {LoginComponent} from './SECURITY/login/login.component';
import {AdminGuard} from './SECURITY/guards/admin.guard';
import {EntreneurGuard} from './SECURITY/guards/entreneur.guard';
import {OrganisateurGuard} from './SECURITY/guards/organisateur.guard';
import {BlogsComponent} from './ACCUEILS/blogs/blogs.component';
import {BlogGuard} from './SECURITY/guards/blog.guard';
import { MatcheComponent } from './ACCUEILS/matche/matche.component';
import { TicketGuard } from './SECURITY/guards/ticket.guard';


const routes: Routes = [
  { path: '', component: AccueilComponent},
  { path: 'admin', component: AdminComponent, canActivate: [AdminGuard]},
  { path: 'login', component: LoginComponent},
  { path: 'entreneur/:id', component: EntreneurComponent, canActivate: [EntreneurGuard] },
  { path: 'organisateur/:id', component: OrganisateurComponent, canActivate: [OrganisateurGuard]},
  { path: 'ticket/:id', component: TicketComponent, canActivate: [TicketGuard]},
  { path: 'blog/:id', component: BlogComponent, canActivate: [BlogGuard]},
  { path: 'connexion', component: ConnexionComponent},
  { path: 'compte', component: CompteComponent},
  { path: 'accueil', component: AccueilComponent},
  { path: 'matche', component: MatcheComponent},
  { path: 'blogs', component: BlogsComponent},
  { path: '**', component: NotFoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
