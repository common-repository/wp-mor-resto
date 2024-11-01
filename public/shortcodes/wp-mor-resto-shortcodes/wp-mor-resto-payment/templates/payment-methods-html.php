<?php
    $paymentMethods = $atts["payment"];
    if (!empty($paymentMethods)) {
        echo "<div class='payment-methods'>";
            foreach($paymentMethods as $method) {
                $svgContent = file_get_contents(WP_Mor_Resto_Public::get_asset_url('icons/icon-'.$method.'.svg'));
                echo $svgContent;
            }
        echo "</div>";
    }
?>
