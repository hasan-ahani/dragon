<?php

namespace Dragon\Route;
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

    public function template($template)
    {
        global $dragon;

        echo $dragon->view('Page/auth');
    }

    public function redirect()
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

}
