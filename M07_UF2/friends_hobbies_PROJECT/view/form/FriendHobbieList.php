<nav class="ms-3 mt-3">
<div id="content">
    <fieldset>
        <legend>Llista d'amics i hobbies</legend>    
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table class="table table-bordered">
                        <tr>
                            <th>Id de l'amic </th>
                            <th>Nom de l'amic</th>
                            <th>Id del hobbie</th>
                            <th>Nom del hobbie</th>
                            
                        </tr>
EOT;
                foreach ($content as $friend) {
                    echo <<<EOT
                        <tr>
                            <td>{$friend->getFriendId()}</td>
                            <td>{$friend->getFriendName()}</td>
                            <td>{$friend->getHobbyId()}</td>
                            <td>{$friend->getHobbyName()}</td>


EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
            else {
                echo "<p>No s'han trobat amics amb hobbies.</p>";  
            }

        ?>
    </fieldset><br>

    <li><a href="index.php?menu=friends&option=form_assign" class="btn btn-primary">Assignar amics amb hobbies</a></li>




</div>
</nav>