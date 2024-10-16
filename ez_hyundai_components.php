<?php

/**
* Plugin Name: Ez Hyundai Components
* Plugin URI: https://www.wordpress.org/mv-testimonials
* Description: Components for Hyundai Websites
* Version: 1.0
* Requires at least: 6.0
* Requires PHP: 8.0
* Author: Cezar Ferreira
* Author URI:
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ez-hyundai-components
* Domain Path: /languages
*/
/*
Ez Hyundai Components is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Ez Hyundai Components is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Ez Hyundai Components. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

use shortcodes\Ez_Hyundai_Components_Nav_Menu;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'Ez_Hyundai_Components' ) ){

    class Ez_Hyundai_Components{

        public function __construct() {

            // Define constants used throughout the plugin
            $this->define_constants();

	        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 999 );

			require_once EZ_HYUNDAI_COMPONENTS_PATH . 'shortcodes/Ez_Hyundai_Components_Nav_Menu.php';
			$ezHyundaiComponentsNavMenu = new Ez_Hyundai_Components_Nav_Menu();

        }

	    public function enqueue_scripts() {
		    wp_enqueue_script(
			    'ez-hyundai-components-nav-menu',
			    EZ_HYUNDAI_COMPONENTS_URL . 'assets/js/navMenu.js',
			    array('jquery'),
			    EZ_HYUNDAI_COMPONENTS_VERSION,
			    array(
				    'strategy' => 'defer'
			    )
		    );

		    wp_enqueue_style(
			    'dmd-benefit-club-benefits-css',
			    EZ_HYUNDAI_COMPONENTS_URL . 'assets/css/navMenuStyle.css',
			    array(),
			    EZ_HYUNDAI_COMPONENTS_VERSION,
			    'all'
		    );
		}

         /**
         * Define Constants
         */
        public function define_constants(): void {
            // Path/URL to root of this plugin, with trailing slash.
            define ( 'EZ_HYUNDAI_COMPONENTS_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'EZ_HYUNDAI_COMPONENTS_URL', plugin_dir_url( __FILE__ ) );
            define ( 'EZ_HYUNDAI_COMPONENTS_VERSION', '1.0.0' );
        }

        /**
         * Activate the plugin
         */
        public static function activate(): void {
            update_option('rewrite_rules', '' );
        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(): void {
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }

    }
}

if( class_exists( 'Ez_Hyundai_Components' ) ){
    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'Ez_Hyundai_Components', 'activate'));
    register_deactivation_hook( __FILE__, array( 'Ez_Hyundai_Components', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'Ez_Hyundai_Components', 'uninstall' ) );

    $ez_hyundai_components = new Ez_Hyundai_Components();
}