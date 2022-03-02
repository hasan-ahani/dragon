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

    public function redirect()
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


        $perifix = DRAGON_ASSETS. 'modules/dragon/';
        if (defined('DRAGON_VUE_DEV') && DRAGON_VUE_DEV){
            $perifix = DRAGON_VUE_DEV;
        }else{
            wp_enqueue_style('dragon-dashboard', $perifix. 'css/dashboard.css', array(), dragon()->getVersion());
            wp_enqueue_style('dragon-dashboard-vendors', $perifix. 'css/chunk-vendors.css', array('dragon-dashboard'), dragon()->getVersion());

        }
        wp_enqueue_script('dragon-dashboard-vendors', $perifix. 'js/chunk-vendors.js', array(), dragon()->getVersion(), true);
        wp_enqueue_script('dragon-dashboard-common', $perifix. 'js/chunk-common.js', array('dragon-dashboard-vendors'), dragon()->getVersion(), true);
        wp_enqueue_script('dragon-dashboard', $perifix. 'js/dashboard.js', array('dragon-dashboard-common'), dragon()->getVersion(), true);

        wp_localize_script('dragon-dashboard', 'dragon', $this->localize());

    }

    public function localize()
    {
        return [
            'user' => dragon()->user->toArray(),
        ];
    }

}
