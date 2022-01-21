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


if (function_exists('dragon')){

    /**
     * @return Loader
     */
    function dragon()
    {
        global $dragon;
        return $dragon;
    }
}
