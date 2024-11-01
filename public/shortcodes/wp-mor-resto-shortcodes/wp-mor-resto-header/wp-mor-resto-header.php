<?php
require_once WP_MOR_RESTO_PATH . 'public/class-wp-mor-resto-public.php';


class WP_Mor_Resto_Header
{
    function __construct() {
		add_shortcode('wp_mor_resto_header', array($this, 'build_html'));
    }

	function build_html($atts, $content) {
	    $restaurant = WP_Mor_Resto_Public::get_restaurant();
	    $this->getCuisineType($restaurant);
	    $this->getCharacType($restaurant);
	    $this->getAmbienceType($restaurant);
	    $section = isset($atts['section']) ? $atts['section'] : null;

	    $atts = shortcode_atts(array(
            'restaurant' => $restaurant,
            'social' => array(
                'facebook' => get_option('wp_mor_resto_facebook'),
                'instagram' => get_option('wp_mor_resto_instagram'),
                'twitter' => get_option('wp_mor_resto_twitter'),
                'linkedin' => get_option('wp_mor_resto_linkedin')
            )
        ), $atts);

        if (empty($section))
            return;
		ob_start();
		include 'templates/'.$section.'-html.php';
		return ob_get_clean();
	}

	private function getCuisineType($restaurant) {
	    $cuisineArray = &$restaurant->cuisines;
        if (!empty($cuisineArray)) {
            foreach ($cuisineArray as $key => $cuisine){
                $class = new ReflectionClass("CuisinesTable");
                if ($class->hasConstant("$cuisine->_id")) {
                    $value = constant("CuisinesTable::$cuisine->_id");
                    $restaurant->cuisines[$key] = $value;
                }
            }
        }
	}

	private function getCharacType($restaurant) {
        $characteristicsArray = &$restaurant->characteristics;
        if (!empty($characteristicsArray)) {
            foreach ($characteristicsArray as $key => $characteristic){
                $class = new ReflectionClass("CharacterisitcsTable");
                if ($class->hasConstant("$characteristic->_id")) {
                    $value = constant("CharacterisitcsTable::$characteristic->_id");
                    $restaurant->characteristics[$key] = $value;
                }
            }
        }
    }

    private function getAmbienceType($restaurant) {
        $ambiencesArray = &$restaurant->ambiences;
        if (!empty($ambiencesArray)) {
            foreach ($ambiencesArray as $key => $ambience){
                $class = new ReflectionClass("AmbiencesTable");
                if ($class->hasConstant("$ambience->_id")) {
                    $value = constant("AmbiencesTable::$ambience->_id");
                    $restaurant->ambiences[$key] = $value;
                }
            }
        }
    }
}

new WP_Mor_Resto_Header();


class CuisinesTable {
    const TRADITIONAL = "Traditionnel / Classique";
    const MODERN = "Moderne / Créative";
    const EUROPEAN = "Européen";
    const GASTRONOMIC = "Gastronomique";
    const FRENCH_REGIONAL = "Régionale Française";
    const BISTRO = "Brasserie / Bar à vin";
    const FISH = "Poissons / Fruits de Mer";
    const ITALIAN = "Italien";
    const ASIAN = "Asiatique";
    const PROVENCAL = "Provençal";
    const MEAT_GRILL = "Viandes / Grillades";
    const PIZZERIA = "Pizzeria";
    const JAPANESE = "Japonais";
    const FRENCH_SOUTH_WEST = "Sud-Ouest";
    const AFRICAN = "Africain";
    const MIDDLE_EAST = "Moyen-Orient";
    const ALSATIAN = "Alsacien";
    const TAPAS = "Tapas";
    const INDIAN = "Indien";
    const MOROCCAN = "Marocain";
    const AMERICAN = "Américain";
    const CHINESE = "Chinois";
    const LEBANESE = "Libanais";
    const THAI = "Thaïlandais";
    const CORSICAN = "Corse";
    const PIES_SALADS = "Tartes / Salades";
    const CREPERIE = "Crêperie";
    const CHEESE_FONDUE = "Fromages / Fondues";
    const CREOLE = "Cuisine des îles";
    const SPANISH = "Espagnol";
    const VIETNAMESE = "Vietnamien";
    const AUVERGNE = "Auvergnat";
    const SUSHI = "Sushi";
    const KOREAN = "Coréen";
    const VEGETARIAN = "Végétarien";
    const HEALTHY = "Healthy";
    const POKE_BOWL = "Poke bowl";
    const VEGAN = "Vegan";
    const LOCAL_PRODUCTS = "Produits locaux";
    const SOUTH_AMERICA = "Amérique du sud";
    const SANDWICH_CROQUE = "Sandwich / Croque";
    const PORTUGUESE_CUISINE = "Portugais";
    const BISTRONOMIC = "Bistronomique";
    const BOUCHON_LYONNAIS = "Bouchon Lyonnais";
    const MARKET_CUISINE = "Cuisine du marché";
    const WORLD_CUISINE = "Cuisine du monde";
    const GERMAN_SPECIALTIES = "Allemand";
}

class CharacterisitcsTable {
    const SERVICE_GARDEN_TERRACE = "Repas servi en extérieur";
    const NON_SMOKING = "Non fumeur";
    const GROUPS_ACCEPTED = "Groupes acceptés";
    const AIR_CONDITIONING = "Air Conditionné";
    const HANDICAP_ACCESS = "Accès handicapés";
    const PARKING = "Parking";
    const PRIVATE_ROOM = "Salon pour repas privés";
    const BANQUET = "Banquet";
    const NO_DOGS = "Chiens interdits";
    const REST_GARDEN = "Jardin de repos";
    const LATE_SERVICE = "Service tardif";
    const VALET = "Voiturier";
    const ELEVATOR = "Ascenceur";
    const BIRTHDAYS = "Anniversaires";
    const WIFI = "Wifi";
    const DOGS_ALLOWED = "Chiens autorisés";
    const ANIMALS_ALLOWED = "Animaux autorisés";
    const TERRACE_ACCESS = "Terrasse";
    const BIKE_PARKING = "Parking à vélo";
}

class AmbiencesTable {
    const TERRACE = "Terrasse";
    const GARDEN_PARK = "Jardin / Parc";
    const EXCEPTIONAL_VIEW = "Vue exceptionnelle";
    const ROMANTIC = "Romantique";
    const AFTERWORK = "Afterwork";
    const TRENDY = "Branché / Chic";
    const HISTORICAL = "Cadre historique";
    const UNUSUAL = "Insolite";
    const LOUNGE = "Lounge";
    const LIVE_MUSIC = "Musique live";
    const WATERSIDE = "Bord de l'eau";
    const PEOPLE = "People";
    const POOL = "Piscine";
    const PATIO = "Patio";
    const BEACH = "Accès plage";
    const GUINGUETTE = "Guinguette";
    const BARGE = "Péniche";
    const SKI = "Accès piste de ski";
    const COSY = "Cosy";
    const ATYPICAL = "Atypique";
    const WITHOUT_FUSS = "Bonne franquette";
    const BAR_TAPAS = "Bar tapas";
    const RESTAURANT_MODERN = "Moderne";
    const FRIENDLINESS = "Convivialité";
}
