<?php
/**
 * @name        : Manual.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Manual
{

    public function __construct()
    {
        if (isset($_GET['_m']) && method_exists($this, $_GET['_m']) && current_user_can('manage_options')){
            call_user_func(array($this, $_GET['_m']));
        }
    }

    public function activation()
    {

        $activation = new \Dragon\Install\Activation();
        $activation->activate();

        die('tset');

    }

    public function test()
    {
        var_dump('test');
        die();
    }
}


new Manual();
