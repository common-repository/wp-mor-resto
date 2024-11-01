<?php
    $restaurant = $atts["restaurant"];
    $phone = $restaurant->phone;
    $regexp = '/^((?:\+(\d{2})(\d{1})?)|(?:(\d{2})(\d{2})?))(\d{2})(\d{2})(\d{2})(\d{2})$/';
    preg_match($regexp, $phone, $matches, PREG_OFFSET_CAPTURE, 0);
    if (!empty($matches)) {
        if (!empty($matches[4][0])) {
            $phone = $matches[4][0] . ' ' .$matches[6][0] . ' ' . $matches[7][0] . ' ' . $matches[8][0] . ' ' . $matches[9][0];
        } else {
            $phone = '0' . $matches[3][0] . ' ' .$matches[6][0] . ' ' . $matches[7][0] . ' ' . $matches[8][0] . ' ' . $matches[9][0];
        }
    }

    echo "<a href='tel:$restaurant->phone'>$phone</a>";
?>
