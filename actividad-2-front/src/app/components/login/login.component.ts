import { CommonModule } from '@angular/common';
import { Component, ViewChild } from '@angular/core';
import { FormsModule, NgForm} from '@angular/forms';
import { Router } from '@angular/router';
import { LoginService } from '../../services/login.service';
import { RequestStatus } from '../../models/request-status.model';



@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
  providers: [LoginService]
})
export class LoginComponent {
  public usuario: string;
  public contrasena: string;
  @ViewChild('loginForm') loginForm: NgForm | undefined;
  status: RequestStatus = 'inicial';
  
  //public datosLogin: any;

  constructor(private router: Router, /*private loginService: LoginService*/){
    this.usuario = "";
    this.contrasena = "";
    
    /*this.datosLogin = {
      usuario: "",
      contrasena: ""
    }*/
  }

 

  onSubmit():void{
    alert("formulario enviado");
    console.log(this.usuario);
    console.log(this.contrasena);
    //console.log(this.datosLogin);
    /*if(this.loginForm){
      if(this.loginForm.valid){
        this.status = 'cargando';
        this.loginService.iniciarSesion(this.usuario, this.contrasena).subscribe({
          next: () => {
            this.status = 'exitoso';
            this.router.navigate(['/pruebas']);
          },
          error: () => {
            this.status = 'fallo';
          }
        });
      }
    }else{
      //si loginForm es undefined
    }*/
  }
}
