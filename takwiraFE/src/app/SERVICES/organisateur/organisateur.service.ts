import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class OrganisateurService {
  url  = 'http://127.0.0.1:8000/api/matches';
  url1 = 'http://127.0.0.1:8000/api/teams';
  url2 = 'http://127.0.0.1:8000/api/staduims';
  url3 = 'http://127.0.0.1:8000/api/arbitres';
  private _getHeaders(): HttpHeaders {
    let header = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    return header;
  }
  constructor(private http: HttpClient) { }
  /* -------------------------------- Partie Match ----------------------------- */
  getAllMatche(){
    return this.http.get(this.url);
  }
  addMatche(matche: any){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url, matche, options);
  }
  deleteMatche(id){
    return this.http.delete(this.url + '/' + id );
  }
  updateMatche(id, matche){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url + '/' + id, matche, options);
  }
  /* -------------------------------- Partie Stade ----------------------------- */
  addStade(stade: any){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url2, stade , options);
  }
  getAllStade(){
    return this.http.get(this.url2);
  }
  updateStade(id, stade){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url2 + '/' + id, stade , options);
  }
  deleteStade(id){
    return this.http.delete(this.url2 + '/' + id );
  }
  /* -------------------------------- Partie Arbitre ----------------------------- */
  addArbitre(arbitre: any){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url3, arbitre , options);
  }
  getAllArbitre(){
    return this.http.get(this.url3);
  }
  deleteArbitre(id){
    return this.http.delete(this.url3 + '/' + id );
  }
  updateArbitre(id, arbitre){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url2 + '/' + id, arbitre , options);
  }
  /* -------------------------------- Partie team ----------------------------- */
  addOneTeam(team: any){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url1, team, options);
  }
  getAllTeam(){
    return this.http.get(this.url1);
  }
  updateTeam(id, team){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url1 + '/' + id, team , options);
  }
  deleteTeam(id){
    return this.http.delete(this.url1 + '/' + id);
  }
}
