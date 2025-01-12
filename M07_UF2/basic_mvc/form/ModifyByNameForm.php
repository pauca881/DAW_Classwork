<div id="content">
    <form method="post" action="">
        <fieldset>
            <label>Category name *:</label>
            <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) { echo $content->getName(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="Search name and modify" />
        </fieldset>
    </form>
</div>