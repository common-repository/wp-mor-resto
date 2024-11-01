<?php
    $restaurant = $atts["restaurant"];
    if (!empty($restaurant->phone)) {
        echo "<div class='phone'>".$restaurant->phone."</div>";
    }
?>