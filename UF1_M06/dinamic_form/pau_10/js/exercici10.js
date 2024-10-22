//elements constants
const div_info = document.getElementById('taula_info');
const div_info2 = document.getElementById('taula_info2');
const div_resultats = document.getElementById('info_resultats');
let formulari, formulari2;
let array_definitiu=[];

//ARRAYS valors
const categories = ['Calçat', 'Motxilles', 'Roba'];
const opc_calçats = [
    'Botes de trekking',
    'Sneakers',
    'Sabates formal',
    'Sandàlies',
    'Sabates de ball'
];

const opc_motxilles = [
    'Motxilla de càmping',
    'Motxilla escolar',
    'Motxilla de viatge',
    'Motxilla de senderisme',
    'Motxilla urbana',
    'Motxilla desport'
];

const opc_roba = [
    'T-shirt',
    'Jeans',
    'Jaqueta'
];

let data_actual = new Date();

document.addEventListener("DOMContentLoaded", () => {
    creacio_dinamica_formulari();
    div_info.style.display = 'block';
    div_info2.style.display = 'none';
    
  });

const creacio_dinamica_formulari = function(){

    //creació d'un formulari que contingui el primer que s'hi demana, encara que no és obligatori que sigui un formulari tal qual
    formulari = document.createElement('form')
    formulari.setAttribute('id', 'formulari_dinamic')

    const titol = document.createElement('h3')
    titol.textContent= 'Selecciona el tipus de categoria: '
    formulari.appendChild(titol)

    let primer=true;

    //Creació dinàmica de les opcions
    categories.forEach((cat) => {
    
        let radioInput = document.createElement('input');

        // Li atribueixo que el tipus radio, només pot ser escollit una vegada y el value és el valor de l'array de categories
        radioInput.type= 'radio';
        radioInput.setAttribute('name', 'category');
        // o també això últim és equivalent a:
        // radioInput.name='category';
        radioInput.value= cat;
        if (primer){
            radioInput.checked=true;
            primer=false;
        }
       

        //  ---- Creació dels labels corresponents a cada radio button ----
        const label = document.createElement('label');
        label.textContent = cat;

        // Afegir el radio button i l'etiqueta al formulari
        formulari.appendChild(radioInput);
        formulari.appendChild(label);

        formulari.appendChild(document.createElement('br'));
    
    })

    //creació dinàmica de la caixa numèrica

    let campText = document.createElement('input');
    campText.setAttribute('type', 'number');
    campText.setAttribute('id', 'numero_selectors');
    campText.setAttribute('placeholder', 'Escriu aquí cuants selectors vols');
    formulari.appendChild(campText);

    //creació dinàmica del botó
    const boto = document.createElement('button')
    boto.setAttribute('type', 'submit')
    boto.textContent='Enviar'
    formulari.appendChild(boto)

    //afegint tot al div corresponent
    div_info.appendChild(formulari);

    let seleccionat=document.getElementsByName("category")[0].value;
    console.log(document.getElementsByName("category"))
    
    for(let i=0;i<document.getElementsByName("category").length;i++){
        document.getElementsByName("category")[i].addEventListener("change",()=>{
            seleccionat=document.getElementsByName("category")[i].value;
            if(seleccionat=="Calçat"){
                console.log(seleccionat);
                array_definitiu=opc_calçats;
            }
            if(seleccionat=="Motxilles"){
                console.log(seleccionat);
                array_definitiu=opc_motxilles;
            }
            if(seleccionat=="Roba"){
                console.log(seleccionat);
                array_definitiu=opc_roba;
            }
        })
    }
    formulari.addEventListener('submit', clicantFormulari1);
}    

function clicantFormulari1(event){
        event.preventDefault();//per evitar que intenti enviar les dades a l'action ja que no en tenim i això faria que s'esborressin els valors dels camps

        div_info.style.display = 'none'; // amago el formulari anterior
        div_info2.style.display = 'block'; // amago el formulari anterior
        
        formulari2 = document.createElement('form')
        const numero=document.getElementById("numero_selectors");

        if (numero.value < 0 || numero.value > 10) {

            alert('ERROR, posa un nombre entre 0 i 10')
            
        }
        else{

          


            for (let i = 0; i < numero.value; i++) {
            
                let campSelect = document.createElement('select');
                campSelect.setAttribute('id', i);

                //TODO: Igualar seleccio de l'array amb array de valors

                for (let j = 0; j < array_definitiu.length; j++) { 
                    let option = document.createElement('option');
                    option.setAttribute('value', array_definitiu[j]);
                    option.textContent = array_definitiu[j]; // text de la opcioo
                    campSelect.appendChild(option);
                }
                
                formulari2.appendChild(campSelect);
    
            
            }
            
            formulari2.appendChild(document.createElement('br'));

           

                 
            

                      
    
            div_info2.appendChild(formulari2);
            
            document.getElementById("enrere").addEventListener("click",()=>{
                div_info.style.display = 'block';
                div_info2.style.display = 'none';
                div_info2.removeChild(formulari2);
               
                
            })

            
            document.getElementById("endavant").addEventListener('click', function(event){
                event.preventDefault(); //per evitar que intenti enviar les dades a l'action ja que no en tenim i això faria que s'esborressin els valors dels camps


                    // ---- Array per guardar els valors dels selets
                    let valorsSeleccionats = [];

                    // recullo els valors de tots els selects creats
                    let selects = formulari2.querySelectorAll('select');
                    // a cada volta, fico el valor seleccionat en un array
                    selects.forEach(function(select) {
                        valorsSeleccionats.push(select.value);
                    });

                
                    let resultats_impresos = '';

                    for (let i = 0; i < valorsSeleccionats.length; i++) {
                        resultats_impresos += `<p>${valorsSeleccionats[i]}</p>`;
                    }
                


                //Obro una finestra amb els resultats de nou
                const myWindow = window.open('confirm.html', 'Nova finestra', 'width=800,height=800');
                myWindow.document.write('<p> Producte:'+resultats_impresos+'</p> <p> Data actual:'+data_actual+'</p><br> <button id="printant" onClick="window.print()">Imprimir</button><button id="tancant" onClick="window.close()">Tancar</button>');
               
            })


        }
        
       




}








