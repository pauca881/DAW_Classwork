<?php
//per poder fer servir l'únic controlador d'aquesta aplicació
require_once "controller/CategoryController.class.php";

class MainController {

    // només tenimm un mètode per saber que se'ns demana des de la vista i poder actuar segons el cas
    public function processRequest() {

        // PRIMERA MANERA - la que hem fet servir a classe fins ara
        // recuperem l' opció d'un menú
        if(isset($_GET["menu"])){

            $request=$_GET["menu"];

        }
        else {

            $request=NULL;

        }
        // o equivalentment en format comprimit
        //$request=isset($_GET["menu"])?$request=$_GET["menu"]:NULL;
        

                    //SEGONA MANERA - és equivalent a la primera només que utilitzem funcions de filtrat
                    //fent servir una altra notació però equivalent al vist ara:
                        //$request=NULL;
                        //if (filter_has_var(INPUT_GET, 'menu')) {
                        //  $request=filter_input(INPUT_GET, 'menu');
                        //}
                    //equivalentment en format comprimit:
                        //$request=filter_has_var(INPUT_GET, 'menu')?filter_input(INPUT_GET, 'menu'):NULL;


//mirem de quin menú venim
        switch ($request) {
            // si hi haguessin molts controladors, faríem un case per cadascun d'ells. Aquí 
            // per defecte fiquem l'únic controlador que hi ha CategoryController
            // en el cas que hi haguessin molts:
            //case "category":
            //case "products": 
            //ficaríem un case per cada controlador

            //en el cas que volguessim carregar alguna vista per defecte fora de la que ens vindrà dels controladors
            //per a nosaltres, la vista primera és la que ens ofereix el menú de categories
            default:
                $controlCategory=new CategoryController();
                $controlCategory->processRequest();
                break;
               
        }

    }
    
}
