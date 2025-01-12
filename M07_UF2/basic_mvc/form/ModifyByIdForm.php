<div id="content">
    <form method="post" action="">
        <fieldset>
            <label>Category id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="Search and modify" />
        </fieldset>
    </form>
</div>