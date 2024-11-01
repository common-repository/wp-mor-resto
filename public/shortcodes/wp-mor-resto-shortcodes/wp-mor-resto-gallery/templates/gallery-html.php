<?php
    $restaurant = $atts["restaurant"];
    if (!empty($restaurant->images)) {
        echo "<div class='gallery-container'>";
            if (!empty($restaurant->images->cover->name)) {
                echo "<img class='gallery-image' src='".WP_Mor_Resto_Public::get_restaurant_img($restaurant->images->cover->name)."'/>";
            }
            if (!empty($restaurant->images->gallery)) {
                foreach($restaurant->images->gallery as $image) {
                    echo "<img class='gallery-image' src='".WP_Mor_Resto_Public::get_restaurant_img($image->name)."'/>";
                }
            }
        echo "</div>";
    }

?>
