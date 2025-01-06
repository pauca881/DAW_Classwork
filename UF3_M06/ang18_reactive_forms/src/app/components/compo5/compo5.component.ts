import { Component } from '@angular/core';
import {ReactiveFormsModule, FormGroup, FormControl, Validators} from '@angular/forms';
import {NgClass} from '@angular/common';
import { OwnValidators } from '../../validators/ownValidators';

@Component({
  selector: 'app-compo5',
  standalone: true,
  imports: [ReactiveFormsModule, NgClass],
  templateUrl: './compo5.component.html',
  styleUrl: './compo5.component.css'
})
export class Compo5Component {

  opciones: string[] = ['Casat/a', 'Solter/a', 'Divorciat/da'];
  checkboxes: string[] = ['Videojocs', 'Accesoris', 'Novetats del mercat'];


  inscripcioForm=new FormGroup({
      //nomUsuari:new FormControl('',[OwnValidators.onlyLetters_and_sixChars]),
      nomUsuari:new FormControl('',[Validators.minLength(6), Validators.pattern('[a-zA-Z]+')]),
      contrasenya:new FormControl('', [Validators.minLength(8), Validators.pattern('[a-zA-Z0-9]+')]),
      confirmacontrasenya:new FormControl(),
      correuelectronic:new FormControl('', [Validators.email]),
      estatcivil:new FormControl('', [Validators.required]),
      sexe:new FormControl(),
      rebreinfo:new FormControl('', [Validators.required]),
      acceptarcondicions:new FormControl()
  })

  imprimir() {

    const formValues = this.inscripcioForm.value;
    const resultElement = document.getElementById('resultats');

    if(resultElement){
      resultElement.innerHTML = `
        <strong>Nom Usuari</strong>: ${formValues.nomUsuari}<br>
        <strong>Contrasenya</strong>: ${formValues.contrasenya}<br>
        <strong>Confirma Contrasenya</strong>: ${formValues.confirmacontrasenya}<br>
        <strong>Correu Electronic</strong>: ${formValues.correuelectronic}<br>
        <strong>Estat Civil</strong>: ${formValues.estatcivil}<br>
        <strong>Sexe</strong>: ${formValues.sexe}<br>
        <strong>Rebre Info</strong>: ${formValues.rebreinfo}<br>
        <strong>Acceptar Condicions</strong>: ${formValues.acceptarcondicions}<br>
      `;
    }
}

}
