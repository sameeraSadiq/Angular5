import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ItemService {
  private apiUrl = 'http://localhost/ang/api.php'; // Ensure this URL points to your PHP script

  constructor(private http: HttpClient) {}

  addItem(item: { name: string; description: string }): Observable<any> {
    return this.http.post(this.apiUrl, item); // Send POST request
  }
}

