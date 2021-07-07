import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AccueilComponent } from './ACCUEILS/accueil/accueil.component';
import { HeaderComponent } from './ACCUEILS/header/header.component';
import { FooterComponent } from './ACCUEILS/footer/footer.component';
import { AlertComponent } from './ACCUEILS/alert/alert.component';
import { ConnexionComponent } from './ACCUEILS/connexion/connexion.component';
import { CompteComponent } from './ACCUEILS/compte/compte.component';
import { NotFoundComponent } from './ACCUEILS/not-found/not-found.component';
import { AdminComponent } from './ADMINS/admin/admin.component';
import { OrganisateurComponent } from './ADMINS/organisateur/organisateur.component';
import { EntreneurComponent } from './ADMINS/entreneur/entreneur.component';
import { TicketComponent } from './ADMINS/ticket/ticket.component';
import { BlogComponent } from './ADMINS/blog/blog.component';
import {FormControlName, FormsModule, ReactiveFormsModule} from '@angular/forms';
import {HttpClientModule} from '@angular/common/http';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { HeaderAdminComponent } from './ADMINS/header-admin/header-admin.component';

@NgModule({
  declarations: [
    AppComponent,
    AccueilComponent,
    HeaderComponent,
    FooterComponent,
    AlertComponent,
    ConnexionComponent,
    CompteComponent,
    NotFoundComponent,
    AdminComponent,
    OrganisateurComponent,
    EntreneurComponent,
    TicketComponent,
    BlogComponent,
    HeaderAdminComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    ReactiveFormsModule,
  ],
  exports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    FormControlName,
    HttpClientModule,
    ReactiveFormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
