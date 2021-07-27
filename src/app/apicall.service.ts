import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { Geocode } from './geocode';

@Injectable({
    providedIn: 'root'
})

export class ApicallService {
    private REST_API_SERVER = "http://localhost:8080/";

    constructor(private httpClient: HttpClient) { }

    getGeocodes(address: string): Observable<Geocode[]> {
        return this.httpClient.get<Geocode[]>(this.REST_API_SERVER, {params: {address: address}})
    }
}
