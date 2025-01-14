<?php

session_start();


$host = $_SERVER['HTTP_HOST']; // localhost
$path = rtrim(dirname($_SERVER['PHP_SELF']), "/"); //carpeta del projecte

$base = "http://" . $host . $path . "/";
define("PATH_CSS", $base . "view/css/");
define("PATH_IMG", $base . "view/img/");
define("PATH_JS", $base . "view/js/");

require_once "controller/MainController.class.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Friends and Hobbies</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?=PATH_CSS?>header.css">
        <link rel="stylesheet" href="<?=PATH_CSS?>body.css">
        <script src="<?=PATH_JS?>general-fn.js"></script>
    </head>
    <body>
        <div id="page">
            <header>
                <h1>Friends and Hobbies MVC ( PDO )</h1>
            </header>

            <?php
    
                //Nota profes: Falta el manejo de sesiones, mensajes personalizados, solo estan hechas las funciones básicas con txts

                $controlMain=new MainController();
                $controlMain->processRequest();

            ?>
        </div>

        <nav class="ms-3 me-5 mt-3 border border-5 border-danger p-3 rounded">
        <article>
                <p><strong>Benvingut al gestor d'amics i hobbies!</strong></p>
                <p>Aquest gestor esta construït mitjançant MVC (Model-View-Controller) i utilitza PDO ( PHP ) per a accedir a les dades.</p>
                <p>Si vols gestionar la connexió entre Amics i Hobbies, la trobaràs dins de <strong>"Friends"</strong></p>
            </article>

            <h5>L'arxiu de configuració no es config.php, sinó DBConnection.class.php</h5>
            <p class="bg-warning" style="display: inline">Usuari BD: <strong>root</strong></p>
            <p class="bg-warning" style="display: inline">Password BD: <strong>root</strong></p>


        </nav>

    </body>
</html>
