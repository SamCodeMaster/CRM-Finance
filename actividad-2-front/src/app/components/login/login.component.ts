import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule} from '@angular/forms';



@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule, CommonModule],
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
