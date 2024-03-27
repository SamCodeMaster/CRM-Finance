import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { loginDTO } from "../models/DTO/authentication/loginDTO";
import { loginResponseDTO } from "../models/DTO/authentication/loginResponseDTO";


@Injectable()
export class LoginService{
    apiUrl = 'http://localhost/api';
    constructor(
        private http: HttpClient
    ){ }

    public iniciarSesion(pParam: loginDTO): Observable<loginResponseDTO>{
        return this.http.post<loginResponseDTO>(`${this.apiUrl}/login/authenticate`, pParam);
    }

    public crearLogin(pParam: loginDTO): Observable<loginResponseDTO>{
        return this.http.post<loginResponseDTO>(`${this.apiUrl}/login/add`, pParam);
    }

    public actualizarLogin(pParam: loginDTO, pId: number): Observable<loginResponseDTO>{
        return this.http.post<loginResponseDTO>(`${this.apiUrl}/login/update/${pId}`, pParam);
    }

    public deleteLogin(pId: number): Observable<loginResponseDTO>{
        return this.http.get<loginResponseDTO>(`${this.apiUrl}/login/delete/${pId}`);
    }

    public econtrarLoginPorId(pId: number): Observable<loginResponseDTO>{
        return this.http.get<loginResponseDTO>(`${this.apiUrl}/login/findById/${pId}`);
    }


}