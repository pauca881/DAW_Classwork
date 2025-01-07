import { Component } from '@angular/core';
import { Client } from '../../model/Client';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-compo6',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './compo6.component.html',
  styleUrl: './compo6.component.css'
})
export class Compo6Component {

  opciones: string[] = ['Casat/a', 'Solter/a', 'Divorciat/da'];
  checkboxes: string[] = ['Videojocs', 'Accesoris', 'Novetats del mercat'];

  model = new Client(
    '',        // nomUsuari
    '',       // contrasenya
    '',       // confirmacontrasenya
    '', // correuelectronic
    'Solter/a',      // estatcivil
    '',              // sexe
    true,                // rebreinfo
    true                 // acceptarcondicions
  );
    submitted:boolean=false;

  onSubmit(){

    const resultElement = document.getElementById('resultats');
    if(resultElement){
      
      resultElement.innerHTML = `
        <strong>Nom Usuari</strong>: ${this.model.nomUsuari}<br>
        <strong>Contrasenya</strong>: ${this.model.contrasenya}<br>
        <strong>Confirma Contrasenya</strong>: ${this.model.confirmacontrasenya}<br>
        <strong>Correu Electronic</strong>: ${this.model.correuelectronic}<br>
        <strong>Estat Civil</strong>: ${this.model.estatcivil}<br>
        <strong>Sexe</strong>: ${this.model.sexe}<br>
        <strong>Rebre Info</strong>: ${this.model.rebreinfo}<br>
        <strong>Acceptar Condicions</strong>: ${this.model.acceptarcondicions}<br>
      `;

      
    }


  }

}
