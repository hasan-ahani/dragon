<?php

namespace Dragon\Hook;
use Dragon\Helper\Hook;

/**
 * @package     : Dragon\Hook
 * @name        : Actions.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Actions extends Hook
{

    public function register()
    {
        add_action('after_setup_theme', array($this, 'load_theme_language'));
    }


    public function load_theme_language()
    {
        load_theme_textdomain(DRAGON_I118, DRAGON_PATH . 'lang');
    }
}
