import { Component } from '@angular/core';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatListModule } from '@angular/material/list';
import { MatIconModule } from '@angular/material/icon';
import { RouterModule } from '@angular/router';


@Component({
  selector: 'app-comercializacion',
  standalone: true,
  imports: [MatSidenavModule, MatListModule, MatIconModule, RouterModule],
  templateUrl: './comercializacion.component.html',
  styleUrl: './comercializacion.component.css'
})
export class ComercializacionComponent {

}
