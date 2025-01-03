import { Component } from '@angular/core';
import { RouterOutlet, RouterLink } from '@angular/router';
import { Compo1Component } from './components/compo1/compo1.component';
import { Compo2Component } from './components/compo2/compo2.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet,Compo1Component,Compo2Component, RouterLink],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'formsrouting';
}
