<?php

/**
 * @var array $ingredient [id, name, unit, ...]
 * @var array $recipes [id, name, ...]
 */
?>
<h2 class="text-2xl font-bold mb-6"><?php echo htmlspecialchars($ingredient['name']); ?></h2>

<?php include '../app/views/recipes/_index.php'; ?>
