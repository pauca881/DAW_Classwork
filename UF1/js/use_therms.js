const checkbox_termes_dus = document.getElementById('us');
const checkbox_privacitat = document.getElementById('privacitat');
const submitBtn = document.getElementById('enviar_bto');

function checkBoxesStatus() {
    if (checkbox_termes_dus.checked && checkbox_privacitat.checked) {
        alert('Els 2 botons estan seleccionats')
        submitBtn.disabled = false;
    } 
    
    else {
        submitBtn.disabled = true;
        if (checkbox_termes_dus.checked) {
            alert('El botó de termes està seleccionat');
        } else if (checkbox_privacitat.checked) {
            alert('El botó de privacitat està seleccionat');
        }
    }
}

checkbox_termes_dus.addEventListener('change', checkBoxesStatus);
checkbox_privacitat.addEventListener('change', checkBoxesStatus);
