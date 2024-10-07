const form = document.getElementById('formu');
const nomInput = document.getElementById('nom');
const edatInput = document.getElementById('edat');
const dataInput = document.getElementById('data');
const sexeInputs = document.getElementsByName('sexe');
const submitButton = document.getElementById('boto_enviar');

//guarddar estat de les variables
let nom_es_valid = false;
let edat_es_valid = false;
let data_es_valid = false;
let sexe_esta_seleccionat = false;
let sexe_seleccio = '';

//expressions regulars
const nomRegex = /^[a-zA-ZÀ-ÿ\s]{2,50}$/;
const dataRegex = /^\d{4}-\d{2}-\d{2}$/;

function validar_nom() {
    nom_es_valid = nomRegex.test(nomInput.value);
    actualitzar_estat_boto();
}

function validar_edat() {
    const edat = parseInt(edatInput.value);
    edat_es_valid = !isNaN(edat) && edat >= 0 && edat <= 120;
    actualitzar_estat_boto();
}

function validar_data() {
    data_es_valid = dataRegex.test(dataInput.value) && !isNaN(Date.parse(dataInput.value));
    actualitzar_estat_boto();
}

function canvi_sexe(event) {
    sexe_seleccio = event.target.value;
    sexe_esta_seleccionat = true;
    sexeInputs.forEach(input => {
        input.parentElement.classList.remove('error');
    });
    actualitzar_estat_boto();
}

function actualitzar_estat_boto() {
    submitButton.disabled = !(nom_es_valid && edat_es_valid && data_es_valid && sexe_esta_seleccionat);
}

nomInput.addEventListener('blur', validar_nom);
edatInput.addEventListener('blur', validar_edat);
dataInput.addEventListener('blur', validar_data);

sexeInputs.forEach(input => {
    input.addEventListener('change', canvi_sexe);
});

//Aquesta funció només funcionarà correctament en cas de que la funció de
////d) y el botón está deshabilitado mientras esté algún campo con error o vacío.
//no es demani


form.addEventListener('submit', function(event) {
    event.preventDefault();
    if (!sexe_esta_seleccionat) {
        alert('Si us plau, seleccioneu un sexe.');
    } else {
        alert(`Sexe seleccionat: ${sexe_seleccio}`);
    }
});

validar_nom();
validar_edat();
validar_data();
actualitzar_estat_boto();

//DUBTES

//a)  se n'adoni quan canviem de sexe (evento change). 
//Ha de memoritzar en una variable quin sexe hem seleccionat. 
//Si no en seleccionem cap, ha de donar missatge d'error

//Incompatibilitat amb: 

//d) y el botón está deshabilitado mientras esté algún campo con error o vacío.

//Perquè la funció a) sigui possible al 100%, el botó hauría d'estar habilitat desde el principi,
//ja que així, quan li donem a 'Enviar', ens apareixerà el missatge d'error, on s'indica que ha de seleccionar el sexe


//IGNORE ---------------------------------

//auqesta funció serveix per mostrar els missatges d'errors
//se li passen 3 valors -> El que introdueix l'usuari, l'estat de si es true o fals, i el missatge d'error
function missatge_error(input, isValid, errorMessage) {
    
    actualitzar_estat_boto();
}
