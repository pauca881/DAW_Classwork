<?php
//obrim aquí la possibilitat de fer servir sessions ja que tot el que veurem estarà contingut a index.php
//no caldrà fer session_start a cap altre lloc/arxiu de la web!!!!
    session_start();

    //declarem una sèrie de constants

    $host = $_SERVER['HTTP_HOST']; // localhost
    //echo $host; 

    $path = rtrim(dirname($_SERVER['PHP_SELF']), "/"); //carpeta del projecte
   // echo "<br/>".$path;

    $base = "http://" . $host . $path . "/";
    
    //declarem rutes a partir d'aquestes constants i que farem servir al head i al body d'aquesta mateixa pàgina
    define("PATH_CSS", $base . "view/css/");
    define("PATH_IMG", $base . "view/img/");
    define("PATH_JS", $base . "view/js/");
    
    //per poder fer la crida al controlador principal
    require_once "controller/MainController.class.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Institut Provençana Exemple-2 MVC</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?=PATH_CSS?>header.css">
        <link rel="stylesheet" href="<?=PATH_CSS?>body.css">
        <script src="<?=PATH_JS?>general-fn.js"></script>
    </head>
    <body>
        <div id="page">
            <header>
                <a href="http://www.ies-provensana.com"><img src="<?=PATH_IMG?>proven.jpg" alt="proven.jpg"></a>
                <h1>Institut Provençana Exemple-2 MVC amb PHP</h1>
            </header>
            <?php
                $controlMain=new MainController();
                //únic mètode del controlador principal que es pregunta per l'opció del menú
                $controlMain->processRequest();

                //manera també correcta d'instanciar un objecte de la classe MainController i cridar el mètode processRequest
                //(new MainController())->processRequest();
            ?>
        </div>
    </body>
</html>
