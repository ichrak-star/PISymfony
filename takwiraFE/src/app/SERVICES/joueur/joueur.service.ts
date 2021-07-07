import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class JoueurService {
  url = 'http://127.0.0.1:8000/api/joueurs';
  private _getHeaders(): HttpHeaders {
    let header = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    return header;
  }
  constructor(private http: HttpClient) { }
  addJoueur(joueur: any){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url , joueur , options );
  }
  getAllJoueur(){
    return this.http.get(this.url);
  }
  deleteJoueur(id){
    return this.http.delete(this.url + '/' + id );
  }
  updateJ(id, joueur){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url + '/' + id, joueur , options);
  }
}
