<?php

namespace Dragon\Rest\V1;
use Dragon\Model\Post;

/**
 * @package     : Dragon\Rest\V1
 * @name        : Auth.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Auth extends \Dragon\Helper\Rest
{

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->register_route(
            [
                'methods'               => parent::POST,
                'callback'              => array( $this, 'login' )
            ],
            'login',
            true
        );
    }

    /**
     * @return \WP_Error| array
     */
    public function login()
    {
        $username = sanitize_text_field($this->getField('user_name'));
        $password = $this->getField('password');

        $login = wp_signon([
            'user_login' => $username,
            'password' => $password,
        ]);

        /**
         * @var $login \WP_Error
         */
        if (is_wp_error($login)){


            return $this->error($login->get_error_code(), $login->get_error_message(), $_REQUEST);
        }


        return $this->response(__('Log in to your account.', 'dragon'));
    }
}
