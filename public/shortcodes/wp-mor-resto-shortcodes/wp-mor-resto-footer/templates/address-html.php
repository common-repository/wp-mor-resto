<?php
    $restaurant = $atts["restaurant"];
    $address = $restaurant->address;
    if (!empty($address)) {
        echo "<div class='resto-address'>".$address->number." ".$address->label.", ".$address->zipCode." ".$address->city."</div>";
    }
?>
