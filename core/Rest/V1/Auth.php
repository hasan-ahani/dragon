<?php

namespace Dragon\Rest\V1;
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
                [
                    'methods'               => parent::GET,
                    'callback'              => array( $this, 'index' )
                ],
                [
                    'methods'               => parent::POST,
                    'callback'              => array( $this, 'index' ),
                    'public'    => false
                ],
            ],
            false,
            true
        );
    }

    /**
     * @return array
     */
    public function index(): array
    {

        return $this->response();
    }
}
