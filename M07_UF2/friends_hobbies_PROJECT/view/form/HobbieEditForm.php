<nav class="ms-3 mt-3">
<div id="content">
    <fieldset>
        <legend>Editar hobbie</legend>
        
        <?php if (isset($content)): ?>
            <form method="post" action="">

                <div>
                    <label for="id">ID del hobbie *:</label>
                    <!-- Li he posat un readonly perque no es pugui modificar -->
                    <input 
                        type="text" 
                        id="id" 
                        name="id" 
                        value="<?php echo $content->getId(); ?>"
                        readonly
                    />
                </div><br>

                <div>
                    <label for="name">Nom del hobbie *:</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="<?php echo $content->getName(); ?>"
                    />
                </div><br>

                <div>
                    <input 
                        type="submit" 
                        name="action" 
                        value="Actualitzar"
                    />
                </div>

            </form>
        <?php else: ?>
            <p>No existeix el hobbie per editar.</p>
        <?php endif; ?>
    </fieldset>
</div>
</nav>