<div id="content">
    <fieldset>
        <legend>Category list</legend>    
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
EOT;
                foreach ($content as $category) {
                    echo <<<EOT
                        <tr>
                            <td>{$category->getId()}</td>
                            <td>{$category->getName()}</td>
                            <td><a href="index.php?menu=category&option=form_delete&id={$category->getId()}">Delete</a></td>
EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
        ?>
    </fieldset>
</div>
