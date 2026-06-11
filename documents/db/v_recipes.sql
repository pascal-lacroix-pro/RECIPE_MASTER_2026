CREATE OR REPLACE VIEW v_recipes AS
SELECT
    recipes.*,
    COUNT(DISTINCT c.id)    AS comments_count,
    COALESCE(AVG(r.value), 0) AS avg_rating
FROM recipes
LEFT JOIN comments c  ON recipes.id = c.recipe_id
LEFT JOIN ratings  r  ON recipes.id = r.recipe_id
GROUP BY recipes.id;
