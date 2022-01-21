<?php
/**
 * @name        : functions
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();


/**
 * define dragon const
 */
define('DRAGON_PATH', get_template_directory());
define('DRAGON_URI', get_template_directory_uri());
define('DRAGON_CORE', DRAGON_PATH . '/core/');


/**
 * load composer autoloader
 */
if (file_exists(DRAGON_PATH . '/vendor/autoload.php')){
    require DRAGON_PATH . '/vendor/autoload.php';
}

/**
 * register autoLoader class
 */
spl_autoload_register(function ($class) {
    if( str_starts_with( $class,  'Dragon' )){
        $class = str_replace( 'Dragon\\', DRAGON_CORE,  $class );
        $class = str_replace( '\\' , '/',  $class );
        $class.= '.php';

        if (file_exists($class)){
            include $class;
        }
    }
});


global $dragon;
$dragon = new \Dragon\Loader();
$dragon->load();
