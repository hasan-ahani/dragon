<?php

namespace Dragon;
use Dragon\Helper\Hook;
use Dragon\Helper\Rest;

/**
 * @package     : Dragon
 * @name        : Loader
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Loader extends Dragon
{

    /**
     * run theme
     */
    public function run()
    {


        $this->autorun();


        /**
         * rest route init
         */
        add_action( 'rest_api_init', function () {
            $this->restInit();
        } );

        if (is_user_logged_in()){
            $this->user = dg_get_user();
        }


        do_action( 'dragon_loaded' );

    }



    /**
     * auto run class & functions
     */
    public function autorun()
    {

        $autorun = [
            'Routes',
            'PostType',
            'Hook',
            'MetaBox',
        ];

        if ( defined('WP_CLI') && WP_CLI ){
            $autorun[] = 'Cli';
        }

        foreach (glob(DRAGON_CORE . "Functions/*.php") as $filename)
        {
            require_once $filename;
        }

        foreach ($autorun as $item){

            $classes = glob(DRAGON_CORE . $item . '/*.php');
            foreach ($classes as $file)
            {

                $class = 'Dragon\\' . $item . '\\' . basename($file, '.php');


                /**
                 * @var $object
                 */
                $object = new $class;

                if (method_exists($class, 'register')){
                    $object->register();
                }
            }
        }

    }



    /**
     * dragon rest init
     */
    private function restInit()
    {

        $classes = glob(DRAGON_CORE . 'Rest/*/*.php');

        foreach ($classes as $file)
        {

            $class      = str_replace(DRAGON_CORE . 'Rest/' , '', $file);
            $array      = explode('/', $class);
            $class      = str_replace('/' , '\\', $class);
            $class      = str_replace('.php' , '', $class);
            $suffix     = array_shift($array);
            $name       = str_replace('.php' , '', array_pop($array));

            $class = 'Dragon\\Rest\\' . $class;

            /**
             * @var Rest $object
             */
            $object = new $class(strtolower($name), strtolower($suffix));
            $object->register();
        }
    }
}
