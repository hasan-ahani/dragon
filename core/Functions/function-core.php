<?php
/**
 * @name        : function-core.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */

use Dragon\Loader;

defined('ABSPATH') or exit();


if (!function_exists('dragon')){

    /**
     * @return Loader
     */
    function dragon()
    {
        global $dragon;
        return $dragon;
    }
}


if (!function_exists('dg_get_user')){

    /**
     * @return bool|\Dragon\Model\User
     */
    function dg_get_user($user_id = 0)
    {
        return \Dragon\Model\User::getInstance($user_id);
    }
}
