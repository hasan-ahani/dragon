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

class Dashboard extends Route
{

    protected $slug = 'dashboard';

    public function template()
    {
        $this->emptyFrontTemplate('<div id="app"></div>');
    }

    public function redirects()
    {

        if (!is_user_logged_in()){
            wp_redirect( add_query_arg([
                'redirect'  => '/' . $this->slug
            ], home_url('auth')) );
            exit;

        }
    }

    public function title()
    {
        return __('User Dashboard Panel', DRAGON_I118);
    }

    public function enqueue()
    {
        if (!is_user_logged_in()) return;


        $suffix = DRAGON_ASSETS. 'modules/dragon/';
        if (defined('DRAGON_VUE_DEV') && DRAGON_VUE_DEV){
            $suffix = DRAGON_VUE_DEV;
        }else{
            wp_register_style('dragon-dashboard', $suffix. 'css/dashboard.css', array(), dragon()->getVersion());
        }
        wp_register_script('dragon-dashboard', $suffix. 'js/dashboard.js', array(), dragon()->getVersion(), true);
        wp_register_script('dragon-dashboard-vendors', $suffix. 'js/chunk-vendors.js', array('dragon-dashboard'), dragon()->getVersion(), true);
        wp_register_style('dragon-dashboard-vendors', $suffix. 'css/chunk-vendors.css', array('dragon'), dragon()->getVersion());

        wp_localize_script('dragon-dashboard', 'dragon', $this->localize());
        wp_enqueue_script('dragon-dashboard');
        wp_enqueue_script('dragon-dashboard-vendors');
        wp_enqueue_style('dragon-dashboard-vendors');
    }

    public function localize()
    {
        return [
            'user' => dragon()->user->toArray(),
            'menu' => dragon()->user,
        ];
    }

}
