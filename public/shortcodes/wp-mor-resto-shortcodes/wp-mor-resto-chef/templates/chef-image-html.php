<?php
    $restaurant = $atts["restaurant"];
    if (isset($restaurant->images->chef->name)) {
        echo "<div class='chef-image-container'><img class='chef-image' src='".WP_Mor_Resto_Public::get_restaurant_img($restaurant->images->chef->name)."'/></div>";
    } else {
        echo "<div class='chef-no-image'></div>";
    }
?>