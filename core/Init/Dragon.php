<?php
namespace Dragon\Init;
/**
 * @name        : Dragon.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Dragon
{

    /**
     * @var \Dragon\Model\User
     */
    public $user;

    public function view($template, $params = [])
    {
        /**
         * Remove php suffix if exists
         */
        if( strrpos( $template, '.php' ) + 4 == strlen( $template ) ){
            $template = substr( $template, 0, strrpos( $template, '.php' ) );
        }

        $file       =  DRAGON_CORE . 'View/' .  $template . '.php' ;

        if( file_exists( $file ) ) {
            if (is_array($params) && !empty($params)) {
                extract($params);
            }
            ob_start();

            include($file);

            return ob_get_clean();
        }

    }

    /**
     * @param $name
     * @return string
     */
    public function css($name): string
    {
        return DRAGON_ASSETS . 'css/' . $name . '.css';
    }

    /**
     * @param $name
     * @return string
     */
    public function js($name): string
    {
        return DRAGON_ASSETS . 'js/' . $name . '.js';
    }

    /**
     * @return array|false|string
     */
    public function getVersion()
    {
        return wp_get_theme()->get('Version');
    }

    /**
     * is dev
     * @return bool
     */
    public function isDev()
    {
        return defined('WP_DEBUG') && WP_DEBUG;
    }
}
