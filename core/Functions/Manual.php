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
        $methods = get_class_methods($this);
        unset($methods['__construct']);

        foreach ($methods as $method){
            if (isset($_GET['_m_' . $method])){
                $this->$method();
            }
        }
    }

    public function activation()
    {

        $activation = new \Dragon\Activation();
        $activation->activate();

    }
}


new Manual();
