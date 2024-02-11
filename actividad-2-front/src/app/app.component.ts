import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { InicioComponent } from './components/inicio/inicio.component';
import { NavegacionComponent } from './components/navegacion/navegacion.component';
import { CabeceraComponent } from './components/cabecera/cabecera.component';
import { PieComponent } from './components/pie/pie.component';
import { LoginComponent } from './components/login/login.component';


@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, InicioComponent, NavegacionComponent, CabeceraComponent, PieComponent, LoginComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  usuarioActivo:boolean = false;
  title = 'actividad-2-front';
}
