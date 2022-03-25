<?php

namespace Dragon\Routes;
/**
 * @package     : Dragon\Route
 * @name        : Auth.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Auth extends \Dragon\Helper\Route
{

    protected $slug = 'auth';

    public function template()
    {
        global $dragon;

        echo $dragon->view('Page/auth');
    }

    public function redirects()
    {
        global $dragon;
        $redirect = $dragon->getRedirect();

        if (is_user_logged_in()){


            if (isset($_GET['logout'])){
                $redirect = home_url();
            }


            wp_redirect( $redirect );
            exit;

        }
    }

    public function title()
    {
        return __('Login Page', DRAGON_I118);
    }

    public function enqueue()
    {

        $suffix = DRAGON_ASSETS. 'modules/dragon/';
        if (defined('DRAGON_VUE_DEV') && DRAGON_VUE_DEV){
            $suffix = DRAGON_VUE_DEV;
        }else{
            wp_register_style('dragon-auth', $suffix. 'css/auth.css', array(), dragon()->getVersion());
            wp_enqueue_style('dragon-auth');
        }
        wp_register_script('dragon-auth', $suffix. 'js/auth.js', array('dragon-auth-common'), dragon()->getVersion(), true);
        wp_register_script('dragon-auth-vendors', $suffix. 'js/chunk-vendors.js', array(), dragon()->getVersion(), true);
        wp_register_script('dragon-auth-common', $suffix. 'js/chunk-common.js', array('dragon-auth-vendors'), dragon()->getVersion(), true);
        wp_register_style('dragon-auth-vendors', $suffix. 'css/chunk-vendors.css', array('dragon'), dragon()->getVersion());
        wp_register_style('dragon-auth-common', $suffix. 'css/chunk-common.css', array('dragon'), dragon()->getVersion());

        wp_localize_script('dragon-auth', 'dragon', $this->localize());
        wp_enqueue_script('dragon-auth');
        wp_enqueue_script('dragon-auth-common');
        wp_enqueue_script('dragon-auth-vendors');
        wp_enqueue_style('dragon-auth-vendors');
        wp_enqueue_style('dragon-auth-common');
    }


    public function localize()
    {
        return [
            'nonce' => wp_create_nonce('dragon-auth'),
        ];
    }

}
