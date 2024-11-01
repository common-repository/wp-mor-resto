<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.infinitestudio.fr
 * @since      1.0.0
 *
 * @package    WP_Mor_Resto
 * @subpackage WP_Mor_Resto/public
 * @author     Infinite Studio <contact@infinitestudio.fr>
 */
class WP_Mor_Resto_Public {

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

    private static $assetUrl = '/wp-mor-resto/public/assets/';
    private static $staticUrl = 'https://static.midioresto.com/restaurants/';
	private static $restaurant;

	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		self::$assetUrl = plugins_url() . self::$assetUrl;
		$this->defineShortcodes();
	}

	/**
     * Register API Route: Get restaurant by id
     */
    public function loadRestaurant() {
        // get restaurant id from options
        $restaurantId = get_option('wp_mor_resto_restaurant');
        if (empty($restaurantId))
            return;

        // define request uri and data
        $request_uri = 'https://api.midioresto.com/api/v1/restaurants/getRestaurantWithInformations';
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $data = json_encode(array(
                'restaurantId' => $restaurantId,
                'date' => $date->format('Y-m-d\Z')
            ), JSON_FORCE_OBJECT);
        $request_uri = add_query_arg('data', $data, $request_uri);

        // launch request
        $request = wp_remote_get($request_uri);

        // if request error, return
        if(is_wp_error( $request ) || '200' != wp_remote_retrieve_response_code( $request ))
            return;

        // if restaurant si empty, return
        $restaurant = json_decode(wp_remote_retrieve_body($request));
        if(empty($restaurant))
            return;

        // save current restaurant
        self::$restaurant = $restaurant;

    }

    /**
	 * Register the JavaScript for the public-facing side of the site.
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

	    // put variables inside a array
        $data = array(
            "restaurant" => WP_Mor_Resto_Public::get_restaurant()
        );

        // load the Script on Front-End
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-mor-resto-public.js', array('jquery'), $this->version, false);

		// localize script and pass the Data
        wp_localize_script($this->plugin_name, "data", $data);
	}

    /**
     * Return current restaurant
     */
    public function get_restaurant() {
        return self::$restaurant;
    }

    /**
     * Return restaurant img url
     */
    public function get_restaurant_img($imgName) {
        return !empty(self::$restaurant->_id) ? self::$staticUrl . self::$restaurant->_id . '/' . $imgName : $imgName;
    }

    /**
     * Return menu img url by type
     */
    public function get_resto_file($fileName) {
        if (!empty($fileName)) {
            return self::$staticUrl . self::$restaurant->_id . '/' . $fileName;
        }
        return "";
    }

    static function cmp($a, $b) {
        if ($a->order == $b->order) {
           return 0;
        }
        return ($a->order < $b->order) ? -1 : 1;
    }


    /**
     * Get food items by type
     */
    public function get_food_items_by_type($foodItems, $type) {
        $arrayFoodItems = array();
        if (!empty($foodItems)) {
            foreach ($foodItems as $foodItem) {
                if (strcasecmp($foodItem->type, $type)==0) {
                    array_push($arrayFoodItems, $foodItem);
                }
            }
            usort($arrayFoodItems, 'WP_Mor_Resto_Public::cmp');
            return $arrayFoodItems;
        }
        return $arrayFoodItems;
    }



    /**
     * Return day by index
     */
    public function get_day_by_index($index) {
        $intValue = (int)$index;
        switch ($intValue) {
            case 0:
                return "Lundi";
                break;
            case 1:
                return "Mardi";
                break;
            case 2:
                return "Mercredi";
                break;
            case 3:
                return "Jeudi";
                break;
            case 4:
                return "Vendredi";
                break;
            case 5:
                return "Samedi";
                break;
            case 6:
                return "Dimanche";
                break;
        }
    }

    /**
     * Return asset url
     */
    public function get_asset_url($assetName) {
        return self::$assetUrl . $assetName;
    }

    /**
     * Translate language
     */
    public function getLanguage($languageId) {
        $class = new ReflectionClass("Languages");
        if ($class->hasConstant($languageId)) {
            return constant("Languages::$languageId");
        }
        return "";
    }

	/**
	 * Load shortcodes
	 */
	private function defineShortcodes() {
		define('WP_MOR_RESTO_SHORTCODES_ROOT', dirname(__FILE__) . '/shortcodes/');
		define('WP_MOR_RESTO_SHORTCODES_PATH', WP_MOR_RESTO_SHORTCODES_ROOT . 'wp-mor-resto-shortcodes/');
        require_once WP_MOR_RESTO_SHORTCODES_ROOT . 'class-wp-mor-resto-shortcodes.php';
		$shortcodes = new WP_Mor_Resto_Shortcodes();
	}
}


class Languages {
    const LANG_ENGLISH = "Anglais";
    const LANG_FRENCH = "Français";
}

