<?php

class WP_Mor_Resto_Footer
{
    public function __construct() {
		add_shortcode('wp_mor_resto_footer', array($this, 'build_html'));
		require_once WP_MOR_RESTO_PATH . 'public/class-wp-mor-resto-public.php';
    }

	public function build_html($atts, $content) {
	    $restaurant = WP_Mor_Resto_Public::get_restaurant();
	    $section = isset($atts['section']) ? $atts['section'] : null;
	    $day = isset($atts['day']) ? $atts['day'] : null;
        $atts = shortcode_atts(array(
            'restaurant' => $restaurant,
            'index' => $index
        ), $atts);

		if (empty($section))
            return;
        ob_start();
        include 'templates/'.$section.'-html.php';
        return ob_get_clean();
	}
}

new WP_Mor_Resto_Footer();