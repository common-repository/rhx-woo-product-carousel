<?php

if (!class_exists('Rhxwoo_admin'))
{
    class Rhxwoo_admin
    {
        /**
         * Initialize the class
         */
        function __construct()
        {
            $woo_setting = new Rhxwoo_setting();

            new Rhxwoo_menu($woo_setting);
        }
    }
}
