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

EXERCICI .- Directives i pipes

Aplica al teu formulari:

a) 3 directives personalitzades (validació d'inputs)

b) 3 pipes en la sortida de dades,

EXERCICI 7.- Serveis

Crear una component que contingui un formulari de login. Cal escriure a sota "Usuari correcte" o "Credencials incorrectes" depenent de la resposta d'un servei un cop cliquem al botó del formulari.

Aquest servei té dos mètodes. Un dels mètodes genera un array de 1000 objectes usuaris (amb els camps user i password generats en un bucle de 1000 voltes). L'altra mètode recull dos paràmetres provienents de la component nova i mira si hi ha algun usuari dins de l'array que coincideixi el seu nom d'usuari i contrasenya.

Crea una altra component de nom registre (només té dos camps: nom d'usuari i password), que envii dos valors al servei i aquest l'afegeixi a l'array. 

El formularis (reactive o template) només comproven que els camps siguin obligatoris.

EXERCICI 8.- Angular UPC

Projecte UPC. D'aquest projecte podem començar a treballar la part estàtica, és a dir, la que no necessita connectar-se a cap servidor. Fes que el teu projecte contingui diferents components: presentació de la idea general, presentació dels components, link al video de youtube, login, registre,...Tot amb routing, formularis reactius, ...

EXERCICI 9.- Serveis d'Angular.

a) Crea un servei que contingui dos mètodes:

--  un mètode que generi un array de 300 usuaris de tipus User de manera aleatòria, i

--  un segon mètode que faci la validació d'un usuari (de tipus User). És a dir, li passem un User amb només els atributs informats de nom i password, i el mètode ens retorna si està o no està dins de l'array.

b) Crea una nova component de login. Un cop fiquem el nostre nom d'usuari i la nostra contrasenya al formulari, es passen aquests valors al servei creat a l'apartat anterior i aquest servei ens retorna si està o no validat correctament. La component de login ens mostra el missatge corresponent.

c) A continuació, crea una nova entrada al teu routing i menú per poder accedir-hi.

EXERCICI 10.-Comunicació entre components.

1.- Crea una component que cridi al servei creat a l'exercici 8 (només necessitem ara 10 usuaris, canvia el 300 per 10!!!!). Fes que imprimeixi aquests 10 usuaris.

2.- Incorpora al menú la crida a aquesta component nova (routing)

3.- Fes que aparegui al costat dret de cada usuari del llistat un botó de nom "Editar".

4.- Quan cliqui al botó "Editar" d'un dels usuaris del llistat, a sota d'aquest mateix llistat ens ha d'apareèixer un formulari (que abans no hi era) amb els inputs omplerts amb els valors que corresponen a aquest usuari. (passem l'usuari cap a una component nova de nom EditUser)


