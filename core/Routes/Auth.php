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
        global $dragon;
        wp_register_script('dragon-auth', DRAGON_ASSETS. 'modules/dragon/js/auth.js', array(), $dragon->isDev() ? time() : $dragon->getVersion(), true);
        wp_register_script('dragon-auth-vendors', DRAGON_ASSETS. 'modules/dragon/js/chunk-vendors.js', array('dragon-auth'), $dragon->isDev() ? time() : $dragon->getVersion(), true);
        wp_register_style('dragon-auth-vendors', DRAGON_ASSETS. 'modules/dragon/css/chunk-vendors.css', array('dragon'), $dragon->isDev() ? time() : $dragon->getVersion());

        wp_enqueue_script('dragon-auth');
        wp_enqueue_script('dragon-auth-vendors');
        wp_enqueue_style('dragon-auth-vendors');
    }

}
