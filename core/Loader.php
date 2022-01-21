<?php

namespace Dragon;
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

class Loader
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

    }



    /**
     * auto run class & functions
     */
    public function autorun()
    {

        $autorun = [
            'Route',
            'PostType',
        ];

        foreach (glob(DRAGON_CORE . "Functions/*.php") as $filename)
        {
            include $filename;
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
                $object->register();
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

            $class = str_replace(DRAGON_CORE . 'Rest/' , '', $file);
            $array = explode('/', $class);
            $class = str_replace('/' , '\\', $class);
            $class = str_replace('.php' , '', $class);
            $suffix = array_shift($array);
            $name = str_replace('.php' , '', array_pop($array));

            $class = 'Dragon\\Rest\\' . $class;

            /**
             * @var Rest $object
             */
            $object = new $class(strtolower($name), strtolower($suffix));
            $object->register();
        }
    }
}
