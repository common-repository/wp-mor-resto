<?php

class WP_Mor_Resto_Shortcodes {
	private $shortcodes = array("wp-mor-resto-header", "wp-mor-resto-menu", "wp-mor-resto-chef", "wp-mor-resto-payment", "wp-mor-resto-gallery", "wp-mor-resto-footer");

    public function __construct() {
		$this->addShortcodes();
    }

	// Add shortcodes
    function addShortcodes() {
        foreach ($this->shortcodes as $shortcode) {
            require_once WP_MOR_RESTO_SHORTCODES_PATH . $shortcode . '/' . $shortcode . '.php';
        }
    }
}