<?php

/**
 * Assets handlers class
 */
if (!class_exists('Rhxwoo_assets')){

class Rhxwoo_assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'rhxwoo_register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'rhxwoo_register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function rhxwoo_get_scripts() {
        return [
            'rhxwoo-script' => [
                'src'     => RHX_WOO_ASSETS . '/js/frontend.js',
                'version' => filemtime( RHX_WOO_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'rhxwoo-cpactive-script' => [
                'src'     => RHX_WOO_ASSETS . '/js/cp-active.js',
                'version' => filemtime( RHX_WOO_PATH . '/assets/js/cp-active.js' ),
                'deps'    => [ 'jquery' ]
            ],

          'owl-carousel-js' => [
                'src'     => RHX_WOO_ASSETS . '/js/plugin/owl.carousel.min.js',
                'version' => filemtime( RHX_WOO_PATH . '/assets/js/plugin/owl.carousel.min.js' ),
                'deps'    => [ 'jquery' ]
            ],

        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function rhxwoo_get_styles() {
        return [
            'rhxwoo-frontend-style' => [
                'src'     => RHX_WOO_ASSETS . '/css/frontend.css',
                'version' => filemtime( RHX_WOO_PATH . '/assets/css/frontend.css' )
            ],
            'rhxwoo-admin-style' => [
                'src'     => RHX_WOO_ASSETS . '/css/admin.css',
                'version' => filemtime( RHX_WOO_PATH . '/assets/css/admin.css' )
            ],
            'owl-theme-default' => [
                'src'     => RHX_WOO_ASSETS . '/css/owl.theme.default.min.css',
                'version' => filemtime( RHX_WOO_PATH . '/assets/css/owl.theme.default.min.css' )
            ],
            'owl-carousel-min' => [
                'src'     => RHX_WOO_ASSETS . '/css/owl.carousel.min.css',
                'version' => filemtime( RHX_WOO_PATH . '/assets/css/owl.carousel.min.css' )
            ],

        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function rhxwoo_register_assets() {
        $scripts = $this->rhxwoo_get_scripts();
        $styles  = $this->rhxwoo_get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

    }
}
}
