<?php

/**  @var array $randomRecipe [id, title, ...]*/
?>
<section class="relative mb-6">
    <img
        class="w-full h-96 object-cover"
        src="<?php echo htmlspecialchars($randomRecipe['picture']); ?>"
        alt="<?php echo htmlspecialchars($randomRecipe['name']); ?>" />
    <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?php echo htmlspecialchars($randomRecipe['name']); ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-white"><?php echo number_format($randomRecipe['avg_rating'], 1); ?></span>
        </div>
        <p class="text-gray-300 mb-4">
            <?php echo htmlspecialchars(\Core\Helpers\truncate($randomRecipe['description'], 200)); ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2">Par <?php echo $randomRecipe['user_id']; ?></span>
            <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $randomRecipe['comments_count']; ?> commentaires</span>
        </div>
        <a
            href="?recipes=show&id=<?php echo $randomRecipe['id']; ?>"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
            Voir la recette
        </a>
    </div>
</section>