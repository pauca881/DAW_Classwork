<nav class="ms-3 mt-3 border border-dark p-3 rounded">
<div id="content">
    <form method="post" action="">
        <fieldset>
            <label>Hobbie id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" /><br><br>

            <label>Hobbie name *:</label>
            <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) { echo $content->getName(); } ?>" /><br><br>

            <label>* Required fields</label>
            <input type="submit" name="action" value="Add hobbie" />
        </fieldset>
    </form>
</div>
</nav>