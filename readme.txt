=== WP Mor Resto ===
Contributors: infinitestudiofr
Donate link: N/A
Tags: midioresto
Requires at least: 3.0
Tested up to: 5.2.2
Stable tag: 0.0.15
Requires PHP: 5.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Plugin permettant d'afficher les informations de votre restaurant depuis l'API Midi O' Resto.

== Description ==

Plugin permettant d'afficher les informations de votre restaurant depuis l'API Midi O' Resto.

== Installation ==

1. Installez le plugin dans le dossier `/wp-content/plugins/wp-mor-resto`, ou via l'écran d'installation des plugins de Wordpress.
2. Activez le plugin via l'écran 'Extensions' dans Wordpress
3. Utilisez l'écran 'Réglages/WP MoR Resto' pour configurer le plugin
4. Insérez ensuite les shortcodes sur vos pages pour  faire apparaître les informations souhaitées.
    - Liste des shortcodes : wp_mor_resto_header, wp_mor_resto_menu, wp_mor_resto_gallery, wp_mor_resto_payment
    - Exemples :
            * [wp_mor_resto_header section="characteristics"]
            * [wp_mor_resto_menu section="menu-description"]
            * [wp_mor_resto_menu section="fast-menu-image"]
            * [wp_mor_resto_gallery section="gallery"]
            * [wp_mor_resto_payment section="payment-methods"]
            * [wp_mor_resto_chef section="chef-image"]
            * [wp_mor_resto_footer section="address"]
            * [wp_mor_resto_footer section="opening-hours" day="0"] // Pour les horaires renseigner le jour, 0 correspond à lundi
    - Liste des sections :
        - Header :
            -- characteristics
            -- ambiences
            -- cuisines
            -- call
            -- resto-description
            -- resto-name
            -- booking
            -- card-link
        - Menu detaillé :
            -- general : menu-description
            -- Starter : detail-starter-images, detail-starter-infos
            -- Dish    : detail-dish-images, detail-dish-infos
            -- Dessert : detail-dessert-images, detail-dessert-infos
            -- Price   : first-price, second-price, third-price
            -- Like    : like
        - Menu rapide :
            -- fast-menu-image
            -- fast-menu-info
        - Payment :
            -- payment-methods
        - Chef :
            -- chef-image
            -- chef-name
            -- chef description
        - Gallery :
            -- gallery
        - Footer :
            -- address
            -- languages
            -- opening-hours
            -- tel
            -- web-link

== Frequently Asked Questions ==
= Qui peut utilise ce plugin ? =

Seuls les restaurateurs ayant un compte Premium sur Midi O' Resto peuvent bénéficier de ce plugin.

== Screenshots ==
1. N/A

== Changelog ==

0.0.13: Fix phone number and web link display
0.0.12: Fix fast menu image and gallery display
0.0.11: Fix fast menu info
0.0.10: Replace <img/> by svg content
0.0.9: Add cover to gallery + minor fixes
0.0.8: Add card link and fix shortcode errors
0.0.7: Update footer shortcodes
0.0.6: Update menu shortcodes
0.0.5: Update header shortcodes
0.0.4: Update wp mor header shortcode
0.0.3: Fix
0.0.2: Adding shortcodes [wp_mor_resto_header], [wp_mor_resto_menu]
0.0.1: Initial release

== Upgrade Notice ==
N/A
