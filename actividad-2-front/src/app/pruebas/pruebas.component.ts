import { Component, inject } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import {MatButtonModule} from '@angular/material/button';
import { FormsModule } from '@angular/forms';



@Component({
  selector: 'app-pruebas',
  standalone: true,
  imports: [MatButtonModule, FormsModule],
  templateUrl: './pruebas.component.html',
  styleUrl: './pruebas.component.css'
})
export class PruebasComponent {
  constructor(private toaster: ToastrService) {
    //this.toaster.success('Hello world!', 'Toastr fun!');
    this.toaster.info('Hola Mundo','Funciona');
  }
}
