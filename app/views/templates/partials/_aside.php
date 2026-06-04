<aside class="w-full md:w-1/4 p-3">
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">
        <?php
        include_once "../app/models/categoriesModel.php";
        $categories = \App\Models\CategoriesModel\findAll($conn);
        include "../app/views/categories/_index.php";

        ?>
    </div>
    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <?php
        include_once "../app/models/ingredientsModel.php";
        $ingredients = \App\Models\IngredientsModel\findAll($conn);
        include "../app/views/ingredients/_index.php";
        ?>
    </div>
</aside>