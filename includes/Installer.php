<?php

/**
 * Installer class
 */
if (!class_exists('Rhxwoo_installer')){
class Rhxwoo_installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function rhxwoo_run() {
        $this->rhxwoo_add_version();

    }

    /**
     * Add time and version on DB
     */
    public function rhxwoo_add_version() {
        $installed = get_option( 'rhx_woo_installed' );

        if ( ! $installed ) {
            update_option( 'rhx_woo_installed', time() );
        }

        update_option( 'rhx_woo_version', RHX_WOO_VERSION );
    }

}
}
