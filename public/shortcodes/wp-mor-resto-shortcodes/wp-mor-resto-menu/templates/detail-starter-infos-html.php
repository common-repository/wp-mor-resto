<?php
    $dayMenu = $atts["dayMenu"];
    if ($dayMenu && !empty($dayMenu->foodItems)) {
        $foodItems = WP_Mor_Resto_Public::get_food_items_by_type($dayMenu->foodItems, 'starter');
        $svgContent = file_get_contents(WP_Mor_Resto_Public::get_asset_url('icons/icon-starter.svg'));
        foreach ($foodItems as $foodItem) {
            echo "<div class='food-info'>";
                echo "<div class='food-icon-container'>".$svgContent."</div>";
                echo "<div class='food-label'>".$foodItem->label."</div>";
                if ($foodItem->comment && !empty($foodItem->comment)) {
                    echo "<div class='food-desc'>".$foodItem->comment."</div>";
                }
            echo "</div>";
        }
    }
?>
