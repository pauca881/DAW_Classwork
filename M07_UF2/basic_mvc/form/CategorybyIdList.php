<?php if (isset($content)): ?>
    <p>El id de la categoría es: <?php echo $content->getId(); ?></p>
    <p>El nombre de la categoría es: <?php echo $content->getName(); ?></p>
<?php else: ?>
    <p>No se encontró la categoría.</p>
<?php endif; ?>
