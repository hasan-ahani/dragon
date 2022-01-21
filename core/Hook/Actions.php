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
        add_action('after_setup_theme', array($this, 'theme_support_feature'));
    }


    /**
     * load theme lang
     */
    public function load_theme_language()
    {
        load_theme_textdomain(DRAGON_I118, DRAGON_PATH . 'lang');
    }

    public function theme_support_feature()
    {

        add_theme_support( 'automatic-feed-links' );
        $defaults = array(
            'default-color'          => '',
            'default-image'          => '',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'           => 'auto',
            'default-attachment'     => 'scroll',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        );
        add_theme_support( 'custom-background', $defaults );

        $defaults = array(
            'default-image'          => '',
            'width'                  => 0,
            'height'                 => 0,
            'flex-height'            => false,
            'flex-width'             => false,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => true,
            'default-text-color'     => '',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );
        add_theme_support( 'custom-header', $defaults );

        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'audio' , 'chat', 'image') );
        add_theme_support( 'title-tag' );

        $args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        );
        add_theme_support( 'html5', $args );

        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );


    }
}
