<div id="info">
    <?php
        if (is_array($_SESSION['info']) == TRUE) {
            foreach ($_SESSION['info'] as $info) {
                echo "<p>$info</p>";
            }
        }
        else {
            echo "<p>{$_SESSION['info']}</p>";          
        }
    ?>
</div>

<div id="numero_categories">
    <?php
    if (isset($_SESSION['numero_categories'])) {
        echo "<p>Numero de categories existents actuals: {$_SESSION['numero_categories']}</p>";
    }
    ?>

</div>

<div id="id-found">

    <?php 
    if (isset($_SESSION['id_found'])){

        echo "ID: " . $_SESSION['id_found']['id'] . "<br>";
        echo "Nombre: " . $_SESSION['id_found']['name'] . "<br>";

    }

    ?>

</div>

<div id="error">

    <?php
        if (is_array($_SESSION['error']) == TRUE) {
            foreach ($_SESSION['error'] as $error) {
                echo "<p>$error</p>";
            }
        }
        else {
            echo "<p>{$_SESSION['error']}</p>";            
        }
    ?>
</div>
