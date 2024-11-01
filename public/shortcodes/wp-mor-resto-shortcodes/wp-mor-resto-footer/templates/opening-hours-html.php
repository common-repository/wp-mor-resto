<?php
    $restaurant = $atts["restaurant"];
    $noonOpeningHours = $restaurant->openingHours->noon[$day];
    $eveningOpeningHours = $restaurant->openingHours->evening[$day];
    $day = WP_Mor_Resto_Public::get_day_by_index($day);
    echo "<div class='resto-opening-day'>".$day." : "."</div>";
    if (!empty($noonOpeningHours)) {
        echo "<div class='resto-opening-hours'>";
            if (empty($noonOpeningHours->openAt) && empty($noonOpeningHours->closeAt)) {
                echo "<div class='resto-hour-element-closed'>Fermé</div>";
            } else {
                echo "<div class='resto-hour-element'>";
                    echo $noonOpeningHours->openAt;
                    if (!empty($noonOpeningHours->openAt) && !empty($noonOpeningHours->closeAt)) {
                        echo "<span class='hour-separator'>-</span>";
                    }
                    echo $noonOpeningHours->closeAt;
                echo "</div>";
            }
        echo "</div>";
    }

    echo "<div class='pipe-separator'>|</div>";

    if (!empty($eveningOpeningHours)) {
        echo "<div class='resto-opening-hours'>";
            if (empty($eveningOpeningHours->openAt) && empty($eveningOpeningHours->closeAt)) {
                echo "<div class='resto-hour-element-closed'>Fermé</div>";
            } else {
                echo "<div class='resto-hour-element'>";
                    echo $eveningOpeningHours->openAt;
                    if (!empty($eveningOpeningHours->openAt) && !empty($eveningOpeningHours->closeAt)) {
                        echo "<span class='hour-separator'>-</span>";
                    }
                    echo $eveningOpeningHours->closeAt;
                echo "</div>";
            }
        echo "</div>";
    }
?>
