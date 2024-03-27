import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";


@Injectable()
export class LoginService{
    apiUrl = 'ruta';
    constructor(
        private http: HttpClient
    ){ }

    public iniciarSesion(usuario: string, contrasena: string): Observable<any>{
        return this.http.post(`${this.apiUrl}/rutaApi`, {
            usuario,
            contrasena
        });
    }
}