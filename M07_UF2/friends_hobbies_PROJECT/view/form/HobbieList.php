<nav class="ms-3 mt-3">
<div id="content">
    <fieldset>
        <legend>Llista de hobbies</legend>    
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Hobbie</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
EOT;
                foreach ($content as $hobbie) {
                    echo <<<EOT
                        <tr>
                            <td>{$hobbie->getId()}</td>
                            <td>{$hobbie->getName()}</td>
                            <td><a href="?menu=hobbies&option=edit_hobbie&id={$hobbie->getId()}">Edit</a></td>
                            <td><a href="?menu=hobbies&option=delete_hobbie&id={$hobbie->getId()}">Esborrar</a></td>
EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
            else {
                echo "<p>No s'han trobat hobbies</p>";  
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