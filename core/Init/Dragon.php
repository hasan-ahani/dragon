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

    public function view()
    {


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
