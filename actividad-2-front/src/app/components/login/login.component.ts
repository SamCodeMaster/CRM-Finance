import { Component } from '@angular/core';
import { ContenedorModule } from '../../contenedor/contenedor.module';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [ContenedorModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  //public usuario: any;
  //public contrasena: any;
  public datosLogin: any;

  constructor(){
    //this.usuario = "";
    //this.contrasena = "";
    this.datosLogin = {
      usuario: "",
      contrasena: ""
    }
  }

  onSubmit():void{
    alert("formulario enviado");
    console.log(this.datosLogin)
  }
}
