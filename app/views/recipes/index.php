<?php

/**
 * @var array $recipes     [id, name, ...]
 * @var int   $page
 * @var int   $totalPages
 */
?>
<section>
    <h2 class="text-2xl font-bold mb-4">Dernières recettes</h2>
    <?php include "../app/views/recipes/_index.php"; ?>

    <?php if ($totalPages > 1): ?>
        <nav class="flex justify-center items-center gap-2 mt-8">
            <?php if ($page > 1): ?>
                <a href="?recipes&page=<?php echo $page - 1; ?>"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full">
                    &laquo;
                </a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?recipes&page=<?php echo $i; ?>"
                   class="px-4 py-2 rounded-full <?php echo $i === $page ? 'bg-red-500 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?recipes&page=<?php echo $page + 1; ?>"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full">
                    &raquo;
                </a>
            <?php endif; ?>
        </nav>
    <?php endif; ?>
</section>