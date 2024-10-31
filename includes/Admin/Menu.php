<?php

/**
 * The Menu handler class
 */
if (!class_exists('Rhxwoo_menu'))
{
    class Rhxwoo_menu
    {
        public $woomain_setting;

        /**
         * Initialize the class
         */
        function __construct($woo_setting)
        {
            $this->woomain_setting = $woo_setting;

            add_action("admin_menu", [$this, "admin_menu"]);
        }

        /**
         * Register admin menu
         *
         * @return void
         */
        public function admin_menu()
        {
            $parent_slug = "rhxwoo-carousel";
            $capability = "manage_options";

            $hook = add_menu_page(__("RHX Woo Product Carousel", "rhxwoo-carousel") , __("RHX Woo Product Carousel", "rhxwoo-carousel") , $capability, $parent_slug, [$this->woomain_setting, "settings_page"], "dashicons-welcome-write-blog");


            add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );

        }


        /**
         * Enqueue scripts and styles
         *
         * @return void
         */
        public function enqueue_assets() {
            wp_enqueue_style( 'rhxwoo-admin-style' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
            wp_enqueue_script('rhxwoo-cpactive-script');
        }
    }
}
