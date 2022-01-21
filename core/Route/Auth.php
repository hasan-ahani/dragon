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

}
