<?php
/**
 * Frontend handler class
 */
if (!class_exists('Rhxwoo_frontend')){
class Rhxwoo_frontend {

    /**
     * Initialize the class
     */
    function __construct() {
        new Rhxwoo_shortcode();
    }
}
}
