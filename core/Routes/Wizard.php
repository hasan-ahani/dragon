<?php

namespace Dragon\Routes;
use Dragon\Helper\Route;

/**
 * @package     : Dragon\Routes
 * @name        : DragonWizard.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-15
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Wizard extends Route
{

    protected $slug = 'dragon-wizard';

    protected $front = false;
    protected $parent = 'themes.php';

    public function title()
    {
        return 'dragon wizard';
    }

    public function template()
    {
        echo '<div id="app"></div>';
    }


    public function enqueue()
    {
        $suffix = DRAGON_ASSETS. 'modules/dragon/';

        if (defined('DRAGON_VUE_DEV') && DRAGON_VUE_DEV){
            $suffix = DRAGON_VUE_DEV;
        }else{
            wp_register_style('dragon-wizard', $suffix. 'css/wizard.css', array(), dragon()->getVersion());
        }

        wp_register_script('dragon-wizard', $suffix .'js/wizard.js', array(), dragon()->getVersion(), true);
        wp_register_script('dragon-wizard-vendors', $suffix. 'js/chunk-vendors.js', array('dragon-wizard'),  dragon()->getVersion(), true);
        wp_register_style('dragon-wizard-vendors', $suffix. 'css/chunk-vendors.css', array('dragon-wizard'), dragon()->getVersion());

        wp_enqueue_script('dragon-wizard');
        wp_enqueue_script('dragon-wizard-vendors');
        wp_enqueue_style('dragon-wizard-vendors');
    }
}
