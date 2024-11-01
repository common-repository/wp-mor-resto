<?php
    $restaurant = $atts["restaurant"];
    $card = WP_Mor_Resto_Public::get_resto_file($restaurant->card);
    if (!empty($card)) {
        echo "<a class='resto-card-link' href='".$card."'>Carte</a>";
    }
?>
