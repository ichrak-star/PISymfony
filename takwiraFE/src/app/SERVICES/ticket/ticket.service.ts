import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TicketService {
  url = 'http://127.0.0.1:8000/api/tickets';
  constructor(private http: HttpClient) { }
  private _getHeaders(): HttpHeaders {
    let header = new HttpHeaders({
      'Content-Type': 'application/json'
    });

    return header;
  }

  getAllTicket(){
    return  this.http.get(this.url);
  }
  addTicket(data){
    let options = {
      headers: this._getHeaders()
    };
    return this.http.post(this.url , data, options );
  }
}
