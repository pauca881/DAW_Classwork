// Arquitectura de l'exàmen:

// Models ( Dades )
//Creació dinàmica de la primera taula
// Funcions principals: 
// -mostrar taula sense filtre
// -filtrar
// - borrar

const projectes = [
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'backend', year: 2012, language: 'JavaScript', opensource: true},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'backend', year: 2012, language: 'JavaScript', opensource: true},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'frontend', year: 2012, language: 'PHP', opensource: false},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'frontend', year: 2012, language: 'PHP', opensource: true},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'backend', year: 2012, language: 'PHP', opensource: false},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'backend', year: 2012, language: 'Java', opensource: true},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'frontend', year: 2012, language: 'Java', opensource: false},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'frontend', year: 2012, language: 'Java', opensource: true},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'backend', year: 2012, language: 'Java', opensource: false},
    {name: 'Web Project',  description: 'Projecte de moltes webs', category: 'backend', year: 2012, language: 'Java', opensource: true}

  ];

 
//array amb les dades
const categoria = ['backend', 'frontend']
const llenguatge = ['JavaScript', 'PHP', 'Java']
const es_opensource = [true, false]


//Taula on es mostrarà la info
const taula_informacio = document.getElementById('taula_projectes');


// FUNCIÓ BORRAR PROJECTE
function borrar_projecte(i) {
    let confirmar = confirm('Segur que vols borrar lelement?')

    if(confirmar){
        projectes.splice(i, 1); // elimino el projecte de l'array 
        mostrar_taula(); // torna a mostrar la taula després de borarar

    }
  else{
    mostrar_taula(); // torna a mostrar la taula després de borarar


  }
}

// mostro la taula_a_mostrar
function mostrar_taula() {
    let taula_a_mostrar = '<table border="1"><tr><th>Name</th><th>Description</th><th>Category</th><th>Year</th><th>Language</th><th>Open Source</th><th>Action</th></tr>';

    projectes.forEach((projecte, index) => {
        taula_a_mostrar += `<tr>
            <td>${projecte.name}</td>
            <td>${projecte.description}</td>
            <td>${projecte.category}</td>
            <td>${projecte.year}</td>
            <td>${projecte.language}</td>
            <td>${projecte.opensource}</td>
            <td><button onclick="borrar_projecte(${index})">Borrar</button></td>
        </tr>`;
    });

    taula_a_mostrar += '</table>';
    taula_informacio.innerHTML = taula_a_mostrar; // actualitzo la taula
}

// mostrar la taula
mostrar_taula();



    // ------ FUNCIÓ que ens permetrà filtrar per camp OpenSoufce o llenguatge
    const cercador = function(){

    const formulari = document.getElementById('taula_projectes');
    formulari.innerHTML = ''; // borro el anterior anterior

    //Creo el formulari dinamicament
    formulari.innerHTML = `
        <label for="llenguatge">Selecciona un llenguatge:</label>
        <select id="llenguatge">
            
            <option value="JavaScript">JavaScript</option>
            <option value="PHP">PHP</option>
            <option value="Java">Java</option>
        </select>

        <label for="opensource">És Open Source?</label>
        <select id="opensource">
            <option value="true">Sí</option>
            <option value="false">No</option>
        </select>

        <button onclick="filtrarProjectes()">Filtrar</button>
    `;
};

//  FUNCIÓ filtrar y mostrar la taula
    function filtrarProjectes() {

    const llenguatge = document.getElementById('llenguatge').value;
    const es_opensource = document.getElementById('opensource').value;

    const projectesFiltrats = projectes.filter(projecte => {
        const matchLlenguatge = llenguatge ? projecte.language === llenguatge : true;
        const matchOpenSource = es_opensource ? projecte.opensource.toString() === es_opensource : true;
        return matchLlenguatge && matchOpenSource;
    });

    mostrarTaulaFiltrada(projectesFiltrats);

    }

//AQUI LI ESTIC PASSANT EL FILTER
    function mostrarTaulaFiltrada(projectes) {

        let taula = '<table border="1"><tr><th>Name</th><th>Description</th><th>Category</th><th>Year</th><th>Language</th><th>Open Source</th><th>Action</th></tr>';
    
        projectes.forEach((projecte, index) => {
            taula += `<tr>
            <td>${projecte.name}</td>
            <td>${projecte.description}</td>
            <td>${projecte.category}</td>
            <td>${projecte.year}</td>
            <td>${projecte.language}</td>
            <td>${projecte.opensource}</td>
            <td><button onclick="borrar_projecte(${index})">Borrar</button></td>
        </tr>`;
    });

    taula += '</table>';
    document.getElementById('taula_projectes').innerHTML = taula;

    }



    // ------ FUNCIÓ que ens permetrà afegir un nou objecte
    const afegir_nou_projecte = function(){

        const formulari_anterior = document.getElementById('taula_projectes');
        formulari_anterior.innerHTML = ''; // borro el anterior anterior

    //Creació dinàmica del formulari
    const formulari = document.createElement('form')
    formulari.setAttribute('id', 'formulari_dinamic')

    const titol = document.createElement('h3')
    titol.textContent= 'Afegeix un nou projecte: '
    formulari.appendChild(titol)

    //Afegir nom
    let nom = document.createElement('input');
    nom.setAttribute('type', 'text');
    nom.setAttribute('id', 'nom');
    nom.setAttribute('placeholder', 'Escriu aquí el nom');
    nom.setAttribute('required', '');
    formulari.appendChild(nom);

    //Afegir descripcio
    let descripcio = document.createElement('input');
    descripcio.setAttribute('type', 'textarea');
    descripcio.setAttribute('id', 'descripcio');
    descripcio.setAttribute('placeholder', 'Escriu aquí la descripcio');
    descripcio.setAttribute('required', '');
    formulari.appendChild(descripcio);
    formulari.appendChild(document.createElement('br'));
    formulari.appendChild(document.createElement('br'));

        let titol_categoria = document.createElement('p')
        titol_categoria.textContent = 'Escull la categoria:'
        formulari.appendChild(titol_categoria);

        //Creació dinàmica de les opcions backend/frontend
        categoria.forEach((opcio) => {
    
        let radioCategoria = document.createElement('input');
        radioCategoria.setAttribute('required', '');


        // Li atribueixo que el tipus radio, només pot ser escollit una vegada y el value és el valor de l'array de categories
        radioCategoria.setAttribute('type', 'radio');
        radioCategoria.setAttribute('name', 'categoria');
        radioCategoria.setAttribute('value', opcio);

        //  ---- Creació dels labels corresponents a cada radio button ----
        const label = document.createElement('label');
        label.textContent = opcio;

        // Afegir el radio button i l'etiqueta al formulari
        formulari.appendChild(radioCategoria);
        formulari.appendChild(label);

        formulari.appendChild(document.createElement('br'));
        formulari.appendChild(document.createElement('br'));

    })

    //Creació dinàmica del select
    let titol_llenguatge = document.createElement('p')
    titol_llenguatge.textContent = 'Escull el llenguatge:'
    formulari.appendChild(titol_llenguatge);


    const select = document.createElement('select');
    select.setAttribute('required', '');

    select.id = 'llenguatgeSelect';


    llenguatge.forEach(lang => {
        const option = document.createElement('option');
        option.value = lang;
        option.textContent = lang;
        select.appendChild(option);
    });
    
    
    formulari.appendChild(select);

    formulari.appendChild(document.createElement('br'));
    formulari.appendChild(document.createElement('br'));
   


    let titol_opensource = document.createElement('p')
    titol_opensource.textContent = 'Es opensource?'
    formulari.appendChild(titol_opensource);

    //Creació dinàmica de les opcions OpenSource
    es_opensource.forEach((opcio) => {
    
        let radioOpensource = document.createElement('input');
        radioOpensource.setAttribute('required', '');

        // Li atribueixo que el tipus radio, només pot ser escollit una vegada y el value és el valor de l'array de categories
        radioOpensource.setAttribute('type', 'radio');
        radioOpensource.setAttribute('name', 'es_opensource');
        radioOpensource.setAttribute('value', opcio);

        //  ---- Creació dels labels corresponents a cada radio button ----
        const label = document.createElement('label');
        label.textContent = opcio;

        // Afegir el radio button i l'etiqueta al formulari
        formulari.appendChild(radioOpensource);
        formulari.appendChild(label);

        formulari.appendChild(document.createElement('br'));
        formulari.appendChild(document.createElement('br'));

    })






    const boto = document.createElement('button')
    boto.setAttribute('type', 'submit')
    boto.textContent='Afegir'
    
    formulari.appendChild(boto)

    formulari.appendChild(document.createElement('br'));
    formulari.appendChild(document.createElement('br'));

    taula_informacio.appendChild(formulari);

    //Formulari per afegir les dades a l'array
    formulari.addEventListener('submit', function(event){
        event.preventDefault(); 

        //Agafo el valors
        let valor_nom = nom.value
        let valor_descripcio = descripcio.value

        //Valor radio categoria
        const selectedRadio_categoria = document.querySelector('input[name="categoria"]:checked'); 
        valor_selectCategoria = selectedRadio_categoria.value

        //El select no m'agafa el valor
        //let valor_selectllenguatge = document.getElementById('llenguatge').value;

       
        //Valor radio opensource
        const selectedRadio_Opensource = document.querySelector('input[name="es_opensource"]:checked'); 
        valor_selectOpenSource = selectedRadio_Opensource.value

        
        //Amago el formulari
        formulari.innerHTML = ''; // borro el anterior anterior

        //Afegeixo les noves dades al nou array
        const nou_objecte = {
            name: valor_nom,
            description: valor_descripcio,
            category: valor_selectCategoria,
            year: new Date().getFullYear(), //creo una nova data no m'ha donat temps a fer l'altre select
            language: valor_selectCategoria,
            opensource: valor_selectOpenSource
        };

        projectes.push(nou_objecte);

        //Després d'afegir el nou objecte a l'array, mostro la taula de nou amb el nou objecte
        mostrar_taula()

    })

    }


document.getElementById('projecte_nou').addEventListener('click', afegir_nou_projecte);
document.getElementById('cercador').addEventListener('click', cercador);




