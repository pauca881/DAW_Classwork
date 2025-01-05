import { Component } from '@angular/core';
import {ReactiveFormsModule, FormGroup, FormControl} from '@angular/forms';

@Component({
  selector: 'app-compo2',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './compo2.component.html',
  styleUrl: './compo2.component.css'
})
export class Compo2Component {
  
  contactForm=new FormGroup({
      nombre:new FormControl(),
      email:new FormControl(),
      mensaje:new FormControl()

  }




  )

}
