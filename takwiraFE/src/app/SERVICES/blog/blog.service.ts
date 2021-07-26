import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class BlogService {
  url = 'http://127.0.0.1:8000/api/publications';
  url2 = 'http://127.0.0.1:8000/api/commentaires';
  constructor(private http: HttpClient) { }
  private _getHeaders(): HttpHeaders {
    let header = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    return header;
  }
  /*---------------------------------Partie Publication----------------------------------------*/
  getAllPublication(){
    return  this.http.get(this.url);
  }
  addPublication(data){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url , data, options );
  }

  deletePublication(id){
    return this.http.delete(this.url + '/' + id);
  }
  updatePublication(id, pub){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url + '/' + id, pub, options);
  }
  /*---------------------------------Partie Commentaires----------------------------------------*/
  getAllCommentaire(){
    return  this.http.get(this.url2);
  }
  addCommentaire(data){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url2 , data, options );
  }

  deleteCommentaire(id){
    return this.http.delete(this.url2 + '/' + id);
  }
  updateCommentaire(id, com){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.put(this.url2 + '/' + id, com, options);
  }
}
