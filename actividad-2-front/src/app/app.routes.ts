import { Routes } from '@angular/router';
import { PruebasComponent } from './pruebas/pruebas.component';
import { InicioComponent } from './components/inicio/inicio.component';
import { LoginComponent } from './components/login/login.component';
import { RolesComponent } from './components/roles/roles.component';
import { EmpleadosComponent } from './components/empleados/empleados.component';
import { ComercializacionComponent } from './components/comercializacion/comercializacion.component';
import { ReferenciacionComponent } from './components/referenciacion/referenciacion.component';
import { CobranzaComponent } from './components/cobranza/cobranza.component';
import { ErrorComponent } from './components/error/error.component';

export const routes: Routes = [
    {path: 'pruebas', component: PruebasComponent},
    {path: '', component: InicioComponent},
    {path: 'inicio', component: InicioComponent},
    {path: 'login', component: LoginComponent},
    {path: 'roles', component: RolesComponent},
    {path: 'empleados', component: EmpleadosComponent},
    {path: 'comercializacion', component: ComercializacionComponent},
    {path: 'referenciacion', component: ReferenciacionComponent},
    {path: 'cobranza', component: CobranzaComponent},
    {path: '**', component: ErrorComponent}
];
