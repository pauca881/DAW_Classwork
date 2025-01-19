import { Injectable } from '@angular/core';
import { User } from '../model/User';

@Injectable({
  providedIn: 'root'
})
export class ValidacioService {

  private users: User[] = [];


  constructor() { 
    this.generarUsuaris();
  }

  generarUsuaris() : void {

    //Genero 1000 usuaris, es diu user1, user2, user3, etc
    for (let i = 0; i < 1000; i++) {
      this.users.push(new User('user' + i, '1234'));
    }
  }

    getUsuaris() : User[] {
      return this.users;
    }

    afegirUsuari(usuari: User) {
      this.users.push(usuari);
      return true;
    }
  
  };
