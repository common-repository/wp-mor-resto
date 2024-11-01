<?php
    $restaurant = $atts["restaurant"];
    $ambiences_array = $restaurant->ambiences;
    if ($ambiences_array && !empty($ambiences_array) && count($ambiences_array)) {
        foreach ($ambiences_array as $ambience){
            echo "<div class='ambience-element'>" . $ambience . "</div>";
        }
        unset($ambience);
    }
?>
