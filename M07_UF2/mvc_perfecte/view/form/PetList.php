<!-- Container div with ID 'content' -->
<div id="content">

    <!-- Heading for the section -->
    <h2>Pets</h2>

    <!-- Table with Bootstrap styling -->
    <table class="table">

        <!-- Table headers with light background -->
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Owner's NIF</th>
                <th>Pet Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <!-- Table body to display content -->
        <tbody>
            <?php
            // Loop through the $content array to display each element
            foreach ($content as $element) {
                // Start a form for each element
                echo "<form method='post' action=''>";

                // Hidden input field to store the pet's ID
                echo "<input style='display: none;' type='text' name='id' value={$element->getId()}>";

                // Table row for each pet
                echo "<tr>";
                echo "<td>{$element->getId()}</td>";         // Display pet's ID
                echo "<td>{$element->getIdOwner()}</td>";     // Display owner's NIF
                echo "<td>{$element->getName()}</td>";        // Display pet's name
                echo "<td><button class='btn btn-primary' type='submit' name='action' value='form_modify_pet'>Update</button></td>"; // Update button
                echo "<td><button class='btn btn-danger' type='submit' name='action' value='delete'>Delete</button></td>";          // Delete button
                echo "</tr>";

                // Close the form for each element
                echo "</form>";
            }
            ?>
        </tbody>

    </table>
</div>