<?php

namespace Dragon;
/**
 * @package     : Dragon
 * @name        : Loader
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Loader
{

    /**
     * load theme
     */
    public function load()
    {
        $this->autoLoadFunctions();
    }


    /**
     * auto load functions
     */
    private function autoLoadFunctions()
    {
        foreach (glob(DRAGON_CORE . "Functions/*.php") as $filename)
        {
            include $filename;
        }
    }
}
