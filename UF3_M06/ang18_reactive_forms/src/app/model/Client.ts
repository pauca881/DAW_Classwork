export class Client {
    constructor(
      public nomUsuari: string = '',
      public contrasenya: string = '',
      public confirmacontrasenya: string = '',
      public correuelectronic: string = '',
      public estatcivil: string = '',
      public sexe: string = '',
      public rebreinfo: boolean = false,
      public acceptarcondicions: boolean = false
    ) {}
  }