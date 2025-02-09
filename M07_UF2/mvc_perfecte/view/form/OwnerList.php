<!-- only a div -->
<div id="content">
    <h2>Propietarios</h2>
    <table class="table">

        <!-- table headers -->
        <thead class="thead-light">
            <tr>
                <th>Nif</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <!-- table content -->
        <tbody>
            <?php
            foreach ($content as $element) {
                echo "<form method='post' actio=''>";
                echo "<input style='display: none;' type='text' name='nif' value={$element->getNif()}>";
                // Each element of the array $content is an owner
                echo "<tr>";
                echo "<td>{$element->getNif()}</td>";
                echo "<td>{$element->getName()}</td>";
                echo "<td>{$element->getEmail()}</td>";
                echo "<td>{$element->getPhone()}</td>";
                echo "<td><button class='btn btn-primary' type='submit' name='action' value='find_owner_to_update'>Update</button></td>";
                echo "<td><button class='btn btn-danger' type='submit' name='action' value='delete'>Delete</button></td>";
                echo "</tr>";

                echo "</form>";
            }
            ?>
        </tbody>

    </table>
</div>