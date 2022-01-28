<?php

namespace Dragon\Install;
use Dragon\Helper\Table;

/**
 * @package     : Dragon
 * @name        : Activation.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Activation
{


    public function switchTheme($old_theme_name, $old_theme)
    {
        if ($old_theme_name == 'dragon'){
            //$this->deactivate();
        }else{
            $this->activate();
        }
    }


    private function getClass()
    {
        return glob(DRAGON_CORE . 'Table' . DIRECTORY_SEPARATOR . '*.php');
    }


    /**
     * active plugin
     */
    public function activate()
    {
        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        foreach ($this->getClass() as $file)
        {

            $class = 'Dragon\\Table\\' . basename($file, '.php');

            /**
             * @var Table $object
             */
            $object = new $class;
            $object->maybe_upgrade();
        }


        /**
         * dragon activate hook
         */
        do_action('dragon_activate');

        flush_rewrite_rules();
    }


    /**
     * deactivate plugin
     */
    public function deactivate()
    {
        foreach ($this->getClass() as $file)
        {

            $class = 'Dragon\\Table\\' . basename($file, '.php');

            /**
             * @var Table $object
             */
            $object = new $class;
            $object->drop();
        }


        /**
         * dragon plugin deactivate hook
         */
        do_action('dragon_deactivate');


        flush_rewrite_rules();
    }
}
