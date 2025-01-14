<nav class="ms-3 mt-3">
<div id="content">
    <fieldset>
        <legend>Llista d'amics</legend>    
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
EOT;
                foreach ($content as $friend) {
                    echo <<<EOT
                        <tr>
                            <td>{$friend->getId()}</td>
                            <td>{$friend->getName()}</td>
                            <td><a href="?menu=friends&option=edit_friend&id={$friend->getId()}">Edit</a></td>
                            <td><a href="?menu=friends&option=delete_friend&id={$friend->getId()}">Esborrar</a></td>
EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
            else {
                echo "<p>No s'han trobat amics</p>";  
            }

            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
                unset($_SESSION['message']);  // després de mostrar el missatge de la sessió, l' eliminem
            }

            if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
                unset($_SESSION['error']);  // després de mostrar el missatge de la sessió, l' eliminem
            }

        ?>
    </fieldset>
</div>


        </nav>
