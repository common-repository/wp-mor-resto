<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.infinitestudio.fr
 * @since      1.0.0
 *
 * @package    WP_Mor_Resto
 * @subpackage WP_Mor_Resto/admin
 * @author     Infinite Studio <contact@infinitestudio.fr>
 */
class WP_Mor_Resto_Admin {

    /**
	 * The options name to be used in this plugin
	 *
	 * @since     1.0.0
	 * @access    private
	 * @var    string $option_name Option name of this plugin
	 */
	private $option_name = 'wp_mor_resto';

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since    1.0.0
	 *
	 */
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
     * Add an options page under the Settings submenu
     *
     * @since  1.0.0
     */
    public function add_options_page() {
        $this->plugin_screen_hook_suffix = add_options_page(
            'WP MoR Resto Settings',
            'WP MoR Resto',
            'manage_options',
            $this->plugin_name,
            array($this, 'display_options_page')
        );
    }

    /**
     * Register all related settings of this plugin
     * @since  1.0.0
     */
    public function register_setting() {
        // General Section
        add_settings_section(
            $this->option_name . '_general',
            'General',
            array($this, $this->option_name . '_general_cb'),
            $this->plugin_name
        );

        // Restaurant ID
        add_settings_field(
            $this->option_name . '_restaurant',
            'Restaurant ID',
            array( $this, $this->option_name . '_restaurant_cb' ),
            $this->plugin_name,
            $this->option_name . '_general',
            array( 'label_for' => $this->option_name . '_restaurant' )
        );

        // Facebook
        add_settings_field(
            $this->option_name . '_facebook',
            'Facebook',
            array( $this, $this->option_name . '_facebook_cb' ),
            $this->plugin_name,
            $this->option_name . '_general',
            array( 'label_for' => $this->option_name . '_facebook' )
        );

        // Instagram
        add_settings_field(
            $this->option_name . '_instagram',
            'Instagram',
            array( $this, $this->option_name . '_instagram_cb' ),
            $this->plugin_name,
            $this->option_name . '_general',
            array( 'label_for' => $this->option_name . '_instagram' )
        );

        // Twitter
        add_settings_field(
            $this->option_name . '_twitter',
            'Twitter',
            array( $this, $this->option_name . '_twitter_cb' ),
            $this->plugin_name,
            $this->option_name . '_general',
            array( 'label_for' => $this->option_name . '_twitter' )
        );

         // LinkedIn
        add_settings_field(
            $this->option_name . '_linkedin',
            'LinkedIn',
            array( $this, $this->option_name . '_linkedin_cb' ),
            $this->plugin_name,
            $this->option_name . '_general',
            array( 'label_for' => $this->option_name . '_linkedin' )
        );

        /**
         * Register Settings
         */
        register_setting($this->plugin_name, $this->option_name . '_restaurant', array(
            $this,
            $this->option_name . '_sanitize_restaurant'
        ));
        register_setting($this->plugin_name, $this->option_name . '_facebook', array(
            $this,
            $this->option_name . '_sanitize_facebook'
        ));
        register_setting($this->plugin_name, $this->option_name . '_instagram', array(
            $this,
            $this->option_name . '_sanitize_instagram'
        ));
        register_setting($this->plugin_name, $this->option_name . '_twitter', array(
            $this,
            $this->option_name . '_sanitize_twitter'
        ));
        register_setting($this->plugin_name, $this->option_name . '_linkedin', array(
            $this,
            $this->option_name . '_sanitize_linkedin'
        ));
    }

    /**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function wp_mor_resto_general_cb() {
		echo '<p>' . 'Options pour le paramétrage du plugin WP MoR Resto' . '</p>';
	}

    /**
	 * Render the input for restaurant ID
	 *
	 * @since  1.0.0
	 */
	public function wp_mor_resto_restaurant_cb() {
		$restaurant = get_option( $this->option_name . '_restaurant' );
		?>
        <fieldset>
            <label>
                <input type="text" size="40" name="<?= esc_attr( $this->option_name ) . '_restaurant' ?>"
                       id="<?= esc_attr( $this->option_name ) . '_restaurant' ?>"
                       value="<?= esc_attr( $restaurant ) ?>"/>
            </label>
            <p>Renseigner l'id du restaurant à récupérer via l'API Midi O' Resto</p>
        </fieldset>
		<?php
	}

	/**
     * Render the input for facebook account
     * @since  1.0.0
     */
    public function wp_mor_resto_facebook_cb() {
        $facebook = get_option( $this->option_name . '_facebook' );
        ?>
        <fieldset>
            <label>
                <input type="text" size="40" name="<?= esc_attr( $this->option_name ) . '_facebook' ?>"
                       id="<?= esc_attr( $this->option_name ) . '_facebook' ?>"
                       value="<?= esc_attr( $facebook ) ?>"/>
            </label>
        </fieldset>
        <?php
    }

    /**
     * Render the input for instagram account
     * @since  1.0.0
     */
    public function wp_mor_resto_instagram_cb() {
        $instagram = get_option( $this->option_name . '_instagram' );
        ?>
        <fieldset>
            <label>
                <input type="text" size="40" name="<?= esc_attr( $this->option_name ) . '_instagram' ?>"
                       id="<?= esc_attr( $this->option_name ) . '_instagram' ?>"
                       value="<?= esc_attr( $instagram ) ?>"/>
            </label>
        </fieldset>
        <?php
    }

    /**
     * Render the input for twitter account
     * @since  1.0.0
     */
    public function wp_mor_resto_twitter_cb() {
        $twitter = get_option( $this->option_name . '_twitter' );
        ?>
        <fieldset>
            <label>
                <input type="text" size="40" name="<?= esc_attr( $this->option_name ) . '_twitter' ?>"
                       id="<?= esc_attr( $this->option_name ) . '_twitter' ?>"
                       value="<?= esc_attr( $twitter ) ?>"/>
            </label>
        </fieldset>
        <?php
    }

    /**
     * Render the input for linkedin account
     * @since  1.0.0
     */
    public function wp_mor_resto_linkedin_cb() {
        $linkedin = get_option( $this->option_name . '_linkedin' );
        ?>
        <fieldset>
            <label>
                <input type="text" size="40" name="<?= esc_attr( $this->option_name ) . '_linkedin' ?>"
                       id="<?= esc_attr( $this->option_name ) . '_linkedin' ?>"
                       value="<?= esc_attr( $linkedin ) ?>"/>
            </label>
        </fieldset>
        <?php
    }

    /**
     * Render the options page for plugin
     *
     * @since  1.0.0
     */
    public function display_options_page() {
        include_once 'partials/wp-mor-resto-admin-display.php';
    }
}