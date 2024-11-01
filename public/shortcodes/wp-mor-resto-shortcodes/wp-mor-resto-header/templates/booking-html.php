<?php
    $restaurant = $atts["restaurant"];
    echo "<div class='booking'>";
        echo "<form action='http://ls.midioresto.com/booking/".$restaurant->_id."' method='GET' TARGET='_BLANK'>";
            echo "<input type='submit' name='bouton' value='RESERVEZ'>";
        echo "</form>";
    echo "</div>";
?>
