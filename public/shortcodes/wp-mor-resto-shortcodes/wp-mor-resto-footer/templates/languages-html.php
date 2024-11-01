<?php
    $restaurant = $atts["restaurant"];
    $spokenLanguages = $restaurant->spokenLanguages;

    if (!empty($spokenLanguages)) {
        echo "<div class='resto-spoken-languages'>";
            foreach($spokenLanguages as $language) {
                echo "<div class='language'>".WP_Mor_Resto_Public::getLanguage($language->_id)."</div>";
            }
        echo "</div>";
    }
?>
