<?php

namespace Dragon\Routes;
use Dragon\Helper\Route;

/**
 * @package     : Dragon\Routes
 * @name        : Panel.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-22
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Panel extends Route
{

    protected $slug = 'panel';

    public function template($template)
    {
        global $dragon;

        echo $dragon->view('Page/auth');
    }

    public function redirects()
    {

        if (!is_user_logged_in()){
            wp_redirect( add_query_arg([
                'redirect'  => '/panel'
            ], home_url('auth')) );
            exit;

        }
    }

    public function title()
    {
        return __('User Panel', DRAGON_I118);
    }

    public function enqueue()
    {
        global $dragon;
        wp_register_script('dragon-panel', DRAGON_ASSETS. 'modules/dragon/js/panel.js', array(), $dragon->isDev() ? time() : $dragon->getVersion(), true);
        wp_register_script('dragon-panel-vendors', DRAGON_ASSETS. 'modules/dragon/js/chunk-vendors.js', array('dragon-panel'), $dragon->isDev() ? time() : $dragon->getVersion(), true);
        wp_register_style('dragon-panel-vendors', DRAGON_ASSETS. 'modules/dragon/css/chunk-vendors.css', array('dragon'), $dragon->isDev() ? time() : $dragon->getVersion());

        wp_enqueue_script('dragon-panel');
        wp_enqueue_script('dragon-panel-vendors');
        wp_enqueue_style('dragon-panel-vendors');
    }

}
