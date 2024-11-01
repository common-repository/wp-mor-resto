<?php
    $restaurant = $atts["restaurant"];
    $cuisines_array = $restaurant->cuisines;
    if ($cuisines_array && !empty($cuisines_array) && count($cuisines_array)) {
        foreach ($cuisines_array as $cuisine){
            echo "<div class='cook-element'>" . $cuisine . "</div>";
        }
        unset($cuisine);
    }
?>