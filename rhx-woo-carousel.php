<?php
/**
 * Plugin Name: RHX Woocommerce Product Carousel
 * Description:  RHX Woocommerce Product Carousel is best wordpress plugin to display products as grid,carousel,slide system at your website!  Use this shortcode <strong>[rhxwoo-carousel]</strong> in the post/page" where you want to display product carousel.
 * Plugin URI: https://wordpress.org/plugins/rhx-woo-carousel/
 * Author: Rihan Habib
 * Author URI: https://www.facebook.com/rihan.zihad/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: license.txt
 * Text Domain: rhxwoo-carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
*	Get all php file.
*/

require_once __DIR__ . '/includes/Admin/Menu.php';
require_once __DIR__ . '/includes/Admin/Settings.php';
require_once __DIR__ . '/includes/Frontend/Shortcode.php';
require_once __DIR__ . '/includes/Admin.php';
require_once __DIR__ . '/includes/Assets.php';
require_once __DIR__ . '/includes/Dynamic-style.php';
require_once __DIR__ . '/includes/Frontend.php';
require_once __DIR__ . '/includes/Installer.php';


/**
 * The main plugin class
 */
final class RhxWoo_Carousel {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {

        $this->define_rhxwoo_constants();
        $this->trim_woo_thumb();

        register_activation_hook( __FILE__, [ $this, 'rhxwoo_activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_rhxwoo_plugin' ] );

    }



    /**
     * Trim post thumb
     */

    public function trim_woo_thumb() {
       add_image_size( 'woo-thumb', 302, 302, true ); // (cropped)
}

    /**
     * Initializes a singleton instance
     *
     * @return \RhxWoo_Carousel
     */
    public static function rhxwoo_init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_rhxwoo_constants() {
        define( 'RHX_WOO_VERSION', self::version );
        define( 'RHX_WOO_FILE', __FILE__ );
        define( 'RHX_WOO_PATH', __DIR__ );
        define( 'RHX_WOO_URL', plugins_url( '', RHX_WOO_FILE ) );
        define( 'RHX_WOO_ASSETS', RHX_WOO_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_rhxwoo_plugin() {

        new Rhxwoo_assets();

        if ( is_admin() ) {
            new  Rhxwoo_admin();
        } else {
            new  Rhxwoo_frontend();
        }

    }   



    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function rhxwoo_activate() {
        $installer = new Rhxwoo_installer();
        $installer->rhxwoo_run();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \RhxWoo_Carousel
 */
function rhxwoo_carousel() {
    return RhxWoo_Carousel::rhxwoo_init();
}

// kick-off the plugin
rhxwoo_carousel();
