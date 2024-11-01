<?php
    $dayMenu = $atts["dayMenu"];
    $menuImage = WP_Mor_Resto_Public::get_restaurant_img($dayMenu->menuPicture->name);
    if (!empty($menuImage)) {
        echo "<div class='fast-menu-image-container'><img class='fast-menu-image' src='".$menuImage."'/></div>";
    } else {
        echo "<div class='fast-menu-no-image'></div>";
    }
?>
