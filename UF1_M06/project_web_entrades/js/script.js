
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formulari_login');
    const login = document.getElementById('loginEmail');
    const password = document.getElementById('loginPassword');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        if(login.value === 'daw2@proven.cat' || password.value === 'holaalumnat2024'){
            alert('Credencials correctes');
        }
        else{
            alert('Credencials incorrectes');
        }
});
});

//Registre

document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('formulari_registre');
    const nomInput = document.getElementById('nom_registre');
    const emailInput = document.getElementById('email_registre');
    const passwordInput = document.getElementById('contrasenya_registre');
    const confirmPasswordInput = document.getElementById('contrasenya_confirmar_registre');
    const termesCheckbox = document.getElementById('termes_registre');
    const submitButton = document.getElementById('boto_enviar');

    //variables per si estan posades
    let nom_es_valid = false;
    let email_es_valid = true; //amb el type email no es pot posar un email que no sigui valid
    let password_es_valid = false;
    let confirmPassword_es_valid = false;
    let termes_esta_seleccionat = false;
 
    //expressions regulars
    const nomRegex = /^[a-zA-ZÀ-ÿ\s]{2,50}$/;

    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,12}$/;
    //minim 1 lletra minúscula, 1 lletra mayúscula, 1 dígit, longitud entre 8 y 12 caracters

    //^ : inicii de la cadena.
    //(?=.*[a-z]) : minim 1 lletra minúscula.
    //(?=.*[A-Z]) : minim 1 lletra mayúscula.
    //(?=.*\d) : minim 1 dígit.
    //[A-Za-z\d]{8,12} : lletres minúsculas, lletres mayúsculas, dígits, longitud entre 8 y 12 caracters
    //$ : final de la cadena

    function validar_nom() {
        nom_es_valid = nomRegex.test(nomInput.value);
        if(!nom_es_valid){document.getElementById('nom_error').style.display = 'block';}else{document.getElementById('nom_error').style.display = 'none';}
        actualitzar_estat_boto();        
    }

    function validar_password() {
        password_es_valid = passwordRegex.test(passwordInput.value);
        if(!password_es_valid){document.getElementById('pass_error').style.display = 'block';}else{document.getElementById('pass_error').style.display = 'none';}

        actualitzar_estat_boto();
    }

    function validar_confirmPassword() {
        confirmPassword_es_valid = passwordInput.value === confirmPasswordInput.value;
        if(!confirmPassword_es_valid){document.getElementById('conf_pass_error').style.display = 'block';}else{document.getElementById('conf_pass_error').style.display = 'none';}

        actualitzar_estat_boto();
    }

    function validar_termes() {
        termes_esta_seleccionat = termesCheckbox.checked;
        actualitzar_estat_boto();
    }
    


    function actualitzar_estat_boto() {

        submitButton.disabled = !(nom_es_valid && email_es_valid && password_es_valid && confirmPassword_es_valid && termes_esta_seleccionat);
    }
       

    //BLURS i CHANGES
    nomInput.addEventListener('blur', validar_nom);
    passwordInput.addEventListener('blur', validar_password);
    confirmPasswordInput.addEventListener('blur', validar_confirmPassword);
    termesCheckbox.addEventListener('change', validar_termes);

    //eventlistener form
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const nom = nomInput.value;
        const email = emailInput.value;
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const acceptaTermes = termesCheckbox.checked;


        document.getElementById('resultats').style.display = 'block';

        //Injeccó HTML
        resultats.innerHTML = `
                <p><strong>Nom:</strong> ${nom}</p>
                <p><strong>Correu electrònic:</strong> ${email}</p>
                <p><strong>Contrasenya:</strong> ${password}</p>
                <p><strong>Confirma la contrasenya:</strong> ${confirmPassword}</p>
                <p><strong>Accepta els termes:</strong> ${acceptaTermes ? 'Sí' : 'No'}</p>
            `;


    });



});//final dom

