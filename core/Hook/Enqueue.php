<?php

namespace Dragon\Hook;
/**
 * @package     : Dragon\Hook
 * @name        : Enqueue.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Enqueue extends \Dragon\Helper\Hook
{

    public function register()
    {
        $this->action('wp_enqueue_scripts', 'public_enqueue',99 );
    }

    public function public_enqueue()
    {
        global $dragon;
        wp_register_style(
            'dragon',
            $dragon->css( 'style'),
            array(),
            $dragon->isDev() ? time() : $dragon->getVersion());

        wp_register_style(
            'dragon-rtl',
            $dragon->css( 'style-rtl'),
            array(),
            $dragon->isDev() ? time() : $dragon->getVersion());


        wp_register_script(
            'dragon',
            $dragon->js( 'main'),
            array(),
            $dragon->isDev() ? time() : $dragon->getVersion(), true);


        wp_enqueue_style( is_rtl() ? 'dragon-rtl' : 'dragon' );
        wp_enqueue_script(  'dragon' );
    }
}
