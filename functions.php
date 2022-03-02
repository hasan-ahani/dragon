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


define('DRAGON_VUE_DEV', 'http://localhost:7300/');
/**
 * define dragon const
 */
define('DRAGON_PATH', get_template_directory() . '/');
define('DRAGON_URI', get_template_directory_uri());
const DRAGON_I118 = 'dragon';
const DRAGON_CORE = DRAGON_PATH  . 'core' . DIRECTORY_SEPARATOR;
const DRAGON_ASSETS = DRAGON_URI  . '/assets/';


/**
 * load composer autoloader
 */
if (file_exists(DRAGON_PATH . '/vendor/autoload.php')) require DRAGON_PATH . "vendor/autoload.php";

/**
 * register autoLoader class
 */
spl_autoload_register(function ($class) {
    if( strpos( $class,  'Dragon' ) === 0){
        $class = str_replace( 'Dragon\\', DRAGON_CORE,  $class );
        $class = str_replace( '\\' , '/',  $class );
        $class.= '.php';

        if (file_exists($class)){
            include $class;
        }
    }
});

$activation = new \Dragon\Install\Activation();
add_action('after_switch_theme', array($activation, 'switchTheme'), 99, 2);


global $dragon;
$dragon = new \Dragon\Loader();
$dragon->run();
