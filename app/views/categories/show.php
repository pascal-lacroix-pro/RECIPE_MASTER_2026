<?php

/**
 * @var array $category [id, name, description, ...]
 * @var array $recipes [id, name, ...]
 */
?>
<h2 class="text-2xl font-bold mb-2"><?php echo $category['name']; ?></h2>
<p class="text-gray-600 mb-6"><?php echo $category['description']; ?></p>

<?php include '../app/views/recipes/_index.php'; ?>
