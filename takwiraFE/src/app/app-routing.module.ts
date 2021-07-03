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


const routes: Routes = [
  { path: '', component: AccueilComponent},
  { path: 'admin', component: AdminComponent},
  { path: 'entreneur', component: EntreneurComponent},
  { path: 'organisateur', component: OrganisateurComponent},
  { path: 'ticket', component: TicketComponent},
  { path: 'entreneur', component: EntreneurComponent},
  { path: 'blog', component: BlogComponent},
  { path: 'loginEmployeur', component: ConnexionComponent},
  { path: 'compte', component: CompteComponent},
  { path: 'accueil', component: AccueilComponent},
  { path: '**', component: NotFoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
