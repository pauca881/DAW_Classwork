EXERCICI 1.- Bootstrap

Ves a https://www.itsolutionstuff.com/post/how-to-add-bootstrap-5-in-angular-18-applicationexample.html i fes que la teva aplicació Angular integri Bootstrap.

EXERCICI 2.- Bootswatch

Fes que ara el teu projecte faci servir Bootswatch (plantilles lliures de Bootstrap) com a full d'estil predeterminat per a tota l'aplicació.

Mireu com es fa a: https://gist.github.com/HamzaAlnaser/e028b34e81474835cc167a7215c01c4f

EXERCICI 3.- Tailwind CSS (optatiu)

Si saps què és tailwind css, prova de fer servir tailwind a angular.

EXERCICI 4.- Components i primers passos (1a versió sense routing), ús de routing (2a versió amb routing)

Crea dues components, cadascuna d'elles farà la funcionalitat que s'hi descriu de cada botó (descripció a sota), aquestes components les carregues a app.component.

Tenim dos botons amb els textos "Exercici A" i "Exercici B". Quan clico a un botó, desapareix el que hi hagués a sota i hi apareix el relacionat amb el botó clicat

Botó "Exercici A": quan el clico apareix una caixa de texte que demana un número. Un cop introduït es calcula el factorial d'aquell número a sota.

Botó "Exercici B": quan el clico hi apareixen 3 caixes de texte per poder introduir dos números i una operació. Un cop introduïts, i clicat un botó que digui "Opera", fa l'operació bàsica escollida (operacions bàsiques: +, -, * i la /) i dóna el resultat.

Un cop que et surti:

- Intenta validar tot el que entri per les caixes de texte

- Intenta ficar missatge informatiu explícit, en el cas d'error en algun camp de texte

EXERCICI 5.- Formularis reactius:

Fes un formulari que contingui:

Nom d’usuari * (camp de texte, només admet lletres i un mínim de 6)

Contrasenya * (camp de texte, admet lletres i números i un mínim de 8)

Confirmar contrasenya * (igual que l’anterior i ha de coincidir)

Correu electrònic * (camp de texte, només admet email)

Estat civil * (camp de tipus select que rep els seus valors des d’un array amb 3 valors com poden ser: Casat/da, Solter/a, Divorciat/da)

Sexe * (camp de tipus radio amb 3 valors com poden ser: Dona, Home, Altres)

De què vols rebre informació? (camps checkboxes que els seus valors surten d’un array amb 3 valors com poden ser Videojocs, Accesoris, Novetats del mercat)

Acceptar condicions * (camp checkbox)

Enviar (botó que está deshabilitat fins que no siguin correctes tots els camps. En el cas que tot estigui correcte, s’imprimeixen els valors introduïts)

Tots els camps amb * són requerits (obligatoris). Tots els missatges d’error sortiran visibles al costat de cada camp. Mentre hi hagi errors, no es podrà clicar al botó Enviar. Fes servir formularis reactius.

EXERCICI 6.- Formularis basats en plantilla i classes JavaScript:

Fes el formulari de l'exercici 5 PERÒ fent servir formularis basats en plantilla. Utilitza una classe de nom Client de la mateixa manera que hem fet servir la classe Actor a l'exemple de classe


