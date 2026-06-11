<?php

/** @var array $comments [id, content, created_at, user_id, recipe_id] */
?>
<?php foreach ($comments as $comment): ?>
    <div class="mb-4">
        <div class="flex items-center mb-2">
            <img
                src="./pictures/user_<?php echo $comment['user_id']; ?>.jpeg"
                alt="user <?php echo $comment['user_id']; ?>"
                class="w-10 h-10 rounded-full mr-2 object-cover" />
            <span class="text-gray-500 text-sm"><?php echo $comment['created_at']; ?></span>
        </div>
        <p class="text-gray-700"><?php echo htmlspecialchars($comment['content']); ?></p>
    </div>
<?php endforeach; ?>
