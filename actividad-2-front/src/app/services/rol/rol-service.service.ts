import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { RolResponseDTO } from '../../models/DTO/rol/RolResponseDTO';
import { Observable } from 'rxjs';
import { RolDTO } from '../../models/DTO/rol/RolDTO';

@Injectable({
  providedIn: 'root'
})
export class RolServiceService {

    apiUrl = 'http://localhost/api';
    constructor(
        private http: HttpClient
    ){ }

    public traerRoles(): Observable<RolResponseDTO>{
      return this.http.get<RolResponseDTO>(`${this.apiUrl}/rol/getAll`);
    }

    public crearRol(pParam: RolDTO): Observable<RolResponseDTO>{
      return this.http.post<RolResponseDTO>(`${this.apiUrl}/rol/add`, pParam);
    }

    public actualizarRol(pParam: RolDTO, pId: number): Observable<RolResponseDTO>{
      return this.http.post<RolResponseDTO>(`${this.apiUrl}/rol/update/${pId}`, pParam);
    }

    public deleteLogin(pId: number): Observable<RolResponseDTO>{
      return this.http.get<RolResponseDTO>(`${this.apiUrl}/rol/delete/${pId}`);
    }

    public econtrarRolPorId(pId: number): Observable<RolResponseDTO>{
      return this.http.get<RolResponseDTO>(`${this.apiUrl}/rol/findById/${pId}`);
  }
}
