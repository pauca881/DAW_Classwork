<form method="post" action="">

<h1><?php echo ($_GET['option'] == 'form_add') ? "Add" : "Update" ?> Owner</h1>

    <div class="form-group form-inline"> NIF *:
        <input contentEditable="false" <?php echo ($_GET['option'] == 'form_add') ? "" : "readonly" ?> type="text" placeholder="NIF" name="nif" value="<?php if (isset($content)) echo $content->getNif(); ?>">
    </div>

    <div class="form-group form-inline"> Name *:
        <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) echo $content->getName(); ?>">
    </div>

    <div class="form-group form-inline"> Email *:
        <input type="text" placeholder="Email" name="email" value="<?php if (isset($content)) echo $content->getEmail(); ?>">
    </div>
    
    <div class="form-group form-inline"> Phone *:
        <input type="text" placeholder="Phone" name="phone" value="<?php if (isset($content)) echo $content->getPhone(); ?>">
    </div>

    <p>* Required fields</p>

    <input class="btn-success mr-2" type="submit" name="action" value="<?php echo ($_GET['option'] == 'form_add') ? "add" : "update_owner" ?>">
    <input class="btn-danger" type="submit" name="reset" value="reset">

</form>
