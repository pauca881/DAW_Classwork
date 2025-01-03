import { AbstractControl, ValidationErrors } from "@angular/forms";

export class OwnValidators {


    static onlyLetters_and_sixChars(control: AbstractControl): ValidationErrors | null {

        let campo:string = control.value;

        //Si el camp té 6 o més caràcters, i són lletres...	
        if(campo.length <= 6 && /^[a-zA-Z]+$/.test(campo)){

            //El camp cumpleix la condició
            return null;

        }

        else{

            //El camp no cumpleix la condició
            return {onlyLetters_and_sixChars: true};

        }

        }


    

    }




