<?php
    $restaurant = $atts["restaurant"];
    if (!empty($restaurant->websiteUrl)) {
        $url = preg_replace('#^https?://#', '', $restaurant->websiteUrl);
        if (!empty($url)) {
            $url = preg_replace('#/$#', '', $url);
            echo "<div class='restaurant-link'>".$url."</div>";
        } else {
            echo "<div class='restaurant-link'>".$restaurant->websiteUrl."</div>";
        }
    }
?>
