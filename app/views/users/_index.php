<?php

/**  @var array $users [id, title, ...]*/
?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <?php foreach ($users as $user): ?>
        <!-- User Card -->
        <article
            class="bg-white rounded-lg overflow-hidden shadow-lg relative">
            <img
                class="w-full h-48 object-cover"
                src="pictures/<?php echo $user['picture']; ?>"
                alt="<?php echo $user['name']; ?>" />
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2"><?php echo $user['name']; ?></h3>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                    <span>4.5</span>
                </div>
                <p class="text-gray-600"><?php echo \Core\Helpers\truncate($user['biography'], 50); ?></p>
                <a
                    href="?recipes=show&id=<?php echo $user['id']; ?>"
                    class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                    Voir le chef
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>