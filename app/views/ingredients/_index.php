<?php

/**  @var array $ingredients [id, name, unit, ...] */
?>
<h2 class="font-bold text-lg mb-4">Ingrédients</h2>
<ul class="list-reset text-gray-200">
    <?php foreach ($ingredients as $ingredient): ?>
        <li>
            <a
                class="hover:text-white hover:bg-yellow-700 px-2 block"
                href="?ingredients=show&id=<?php echo $ingredient['id']; ?>">
                <?php echo $ingredient['name']; ?> (<?php echo $ingredient['recipes_count']; ?>)
            </a>
        </li>
    <?php endforeach; ?>
</ul>
