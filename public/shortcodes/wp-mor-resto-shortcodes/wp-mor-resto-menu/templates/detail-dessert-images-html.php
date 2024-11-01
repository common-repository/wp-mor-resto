<?php
    $dayMenu = $atts["dayMenu"];
    $arrayFoodItems = WP_Mor_Resto_Public::get_food_items_by_type($dayMenu->foodItems, 'dessert');
    if (!empty($arrayFoodItems)) {
        echo "<div class='food-image-container'>";
            foreach ($arrayFoodItems as $foodItem) {
                if (!empty($foodItem->picture->name) && $foodItem) {
                    echo "<div class='food-image-content'>";
                        echo "<img class='food-image' src='".WP_Mor_Resto_Public::get_resto_file($foodItem->picture->name)."'/>";
                        echo "<div class='label-image'/>".$foodItem->label."</div>";
                    echo "</div>";
                }
            }
        echo "</div>";
    }
?>
