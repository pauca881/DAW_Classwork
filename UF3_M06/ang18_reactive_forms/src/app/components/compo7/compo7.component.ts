import { Component } from '@angular/core';
import { ValidacioService } from '../../services/validacio.service';
import { User } from '../../model/User';
import { CommonModule } from '@angular/common';
import { FormsModule, FormGroup, FormControl, Validators, ReactiveFormsModule } from '@angular/forms'; 
import { CookieService } from 'ngx-cookie-service';
import { NgxPaginationModule } from 'ngx-pagination';

@Component({
  selector: 'app-compo7',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule],  
  templateUrl: './compo7.component.html',
  styleUrl: './compo7.component.css'
})
export class Compo7Component {

  users: User[] = [];

  loginForm = new FormGroup({
    name: new FormControl('', [Validators.required, Validators.minLength(5)]),
    password: new FormControl('', [Validators.required, Validators.minLength(4), Validators.maxLength(4)])
  });

  registerForm = new FormGroup({
    name: new FormControl('', [Validators.required, Validators.minLength(5)]),
    password: new FormControl('', [Validators.required, Validators.minLength(4), Validators.maxLength(4)])
  });

  constructor(private validacioService: ValidacioService, private myCookie: CookieService) {

    this.myCookie.set('Cookiedeprova', 'HEllo cookie', 2);
    this.myCookie.set('Numero', '345');

    console.log(this.myCookie.get('Cookiedeprova'));
    console.log(this.myCookie.get('Numero'));

    this.myCookie.delete('Cookiedeprova');
    localStorage['user'] = "PEP";
    localStorage.setItem('saludo', "Hola");
    
  }

  login(): void {

    //Recullo els usuaris del servei
    this.users = this.validacioService.getUsuaris();

    //Sintaxis desestructuració:
    const { name, password } = this.loginForm.value;


    //El find es un mètode nadiu que retorna el primer element que compleix la condició
    //https://www.geeksforgeeks.org/typescript-array-find-method/
    const usuariTrobat = this.users.find(usuariArray => usuariArray.name === name && usuariArray.password === password);

    if (usuariTrobat) {
      alert(`Usuari trobat: ${usuariTrobat.name}`);
    } else {
      alert(`Usuari no trobat`);
    }

  }

  register(): void {

    const { name, password } = this.registerForm.value;

    //He d'afegir aquesta validació perque sino TypeScript em diu que podria ser que arribin valors nuls
    if (!name || !password) {
      alert('ERROR: El nom i la contrasenya no poden ser nuls');
    }
    else {

      const usuari_a_afegir = new User(name, password);
      const afegirUsuari = this.validacioService.afegirUsuari(usuari_a_afegir);
      alert(`Usuari ${name} afegit correctament`);
      
      //netejo els camps
      this.registerForm.reset();
    }


  }

}
