<nav class="ms-3 mt-3 border border-dark p-3 rounded">

<div id="content">
     <!-- Formulari per assignar hobbie a un amic -->
  <fieldset>
    
        <legend>Assignar hobbies a un amic</legend>
        <form method="post" action="">
        <input type="hidden" name="action" value="Assignar Hobbie">

            <label for="friend">Selecciona un amic:</label>
            <select id="friend" name="friend_id" required>
                <option value="">Selecciona un amic</option>
                <?php
                echo $content;
                    foreach ($content['friends'] as $friend) {
                        echo "<option value=\"{$friend->getId()}\">{$friend->getName()}</option>";
                    }
                ?>
            </select> <br><br>


             <label for="hobby">Selecciona un hobbie:</label><br>
                <?php
                    foreach ($content['hobbies'] as $hobbie) {

                        echo"

                        <input type='checkbox' id='hobbie_id' name='hobbie_id[]' value='{$hobbie->getId()}'>
                        <label for='hobbie_id'>{$hobbie->getName()}</label><br>"

                        ;


                    }

                ?><br>


            <input type="submit" value="Assignar Hobbie">
            
        </form>
    </fieldset>
</div>
</nav>