This little repository only contains some files edited in Laravel Project.
THIS IS NOT A LARAVEL FULL PROJECT, ONLY SOME FILES

In the repository there aren't the environment files and the laravel project, only the edited and added files

Per a autoconnectar sempre Laravel, necessitem primer dir-li quina serà la base de dades per defecte, user i password.. Per això editarem la variable d’entorn del nostre projecte:

![image](https://github.com/user-attachments/assets/2948ae3b-98ea-446f-972a-b024a02d1a32)

Laravel añade el sufijo **s** cuando se ha migrado un modelo correctamente

**Conflicto MYSQL Solucionado**

Al encender Apache y MYSQL con laragon, me salian instancias diferentes con otras bases de datos.
He parado laragon, he encontrado y matado la task del mysql, i al reiniciar laragon, si me abre la instancia MYSQL correcta.

netstat -ano | findstr :3306 para encontrar la task
taskkill /PID 5888 /F para eliminar la task

Probablemente este error era debido a un error y conflicto de puertos, y usaba instancias que no eran


*Exercicis to do*

1- Instal·leu Laravel amb Laragorn

2- Blade amb menu.
Creeu un index amb un menú que linque a dos pàgines informatives (nosaltres i on estem)  i a l’inici. Les pagìnes a partir d’una plantilla nova plantilla.blade.php. Totes les pàgines tindran contingut. Utilitzeu bootstrap e imatges. L'índex es carrega en l'arrel directament.
Els fitxers seran:
plantilla.blade.php
index.blade.php
nosaltres.blade.php
onestem.blade.php

3- Taules
Crea una taula talumne migrada en Laravel dintre de la BBDD del projecte, ha de tenir la columna ‘nom’
Ampliar la taula talumne per a que les dades s’autogeneren des de la migració. Dades DNI, nom,cognom,edat, dataNaixement, observacions. Ha de d’incloure tipus de dates i constraints

4- Inserir
Creeu la pàgina inserir i un link a la pàgina inserir en el menú
Creu la ruta de la pàgina inserir
Creeu un formulari per a omplir les dades de l’alumne. Cal afegir-li CSS i imatges
Creeu la funció del formulari en el controlador
Creeu funció inserir en el controlador amb control d’errors


5- Consultar
Creeu la pàgina consultar i un link a la pàgina consultar en el menú
Creeu la ruta de la pàgina consultar
Crea la pàgina pàgina consultar per a mostrar un llistat de la taula creada. Cal afegir-li CSS i imatges
Creeu la funció de consultar

6- Consultar DETALLE
En consultar al fer click ens mostrarà la informació detallada
La imatge  tindrà el nos dni.jpg
Cal afegir una ruta de imatge i mostrar un avatar
extra: impedir ficar dades errònies per la barra direcció



7- Buscar 
Crear un formulario para buscar un dato  en la tabla
Crear un formulario para buscar más de un dato  en la tabla


8- Borrar
Crear el formulario para borrar alumnos

9- Control d’errors específics
Crear control de errores específics en insertar/borrar/actualitzar
si en la vista consultar detalle canviem en la barra de navegació el dni i no existeix no té que donar un error

10- Seeder
Crear el seeder para tprofessor i talumnes

11- Factory
Crear el factory amb els fakers de talumnes

12- Actualitzar
Fer actualitzar per a talumne

13- Afegir una nova columna sense eliminar les dades
afegeix la columna “tratamiento” (Sr,Sra) a talumne sense eliminar les dades


