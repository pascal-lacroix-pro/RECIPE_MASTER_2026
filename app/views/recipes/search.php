<?php

/**
 * @var array  $recipes [id, name, ...]
 * @var string $query
 */
?>
<h2 class="text-2xl font-bold mb-6">Recherche : <em><?php echo htmlspecialchars($query); ?></em></h2>

<?php if (empty($recipes)): ?>
    <p class="text-gray-600">Aucune recette trouvée.</p>
<?php else: ?>
    <?php include '../app/views/recipes/_index.php'; ?>
<?php endif; ?>
