<?php
    $restaurant = $atts["restaurant"];
    $carac_array = $restaurant->characteristics;
    if ($carac_array && !empty($carac_array) && count($carac_array)) {
        foreach ($carac_array as $carac){
            echo "<div class='caracteristics-element'>" . $carac . "</div>";
        }
        unset($carac);
    }
?>
