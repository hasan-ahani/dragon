<?php

namespace Dragon\Helper;
/**
 * @package     : Dragon\Helper
 * @name        : MetaBox.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-23
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract class MetaBox
{

    /**
     * meta box id
     * @var $id int
     */
    public $id;


    /**
     * meta box screens
     * @var $title string
     */
    public $screens = ['post'];

    /**
     * meta box fields
     * @var $fields array
     */
    public $fields = [];


    /**
     * register enqueue
     */
    public function register()
    {

        if (method_exists($this,'render') ) {
            add_action('add_meta_boxes', array($this, 'addMetaBox'));
        }

        if ($this->id &&  array_key_exists( $this->id, $_POST ) && method_exists($this,'save') ) {
            add_action('save_post', array($this, 'save') );
        }

        if (method_exists($this,'enqueue')){
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        }

    }

    public function addMetaBox()
    {
        if ($this->screens){
            add_meta_box(
                $this->id,
                $this->getTitle(),
                [ $this , 'render' ],
                $this->screens
            );
        }
    }

    /**
     * @return bool
     */
    public function isCurrentScreen()
    {
        if (!function_exists('get_current_screen')) return false;

        $screen = get_current_screen();
        return is_object($screen) && in_array($screen->post_type, $this->screens);
    }


    /**
     * render
     * @param \WP_Post $post
     * @return mixed
     */
    public function render(\WP_Post $post)
    {
        global $dragon;

        $reflect = new \ReflectionClass($this);
        $name = array_filter(preg_split('/(?=[A-Z])/', $reflect->getShortName()));

        $data = method_exists($this,'getParams') ? $this->getParams() : [];

        $file = 'MetaBox/' . strtolower(implode('-', $name));

        echo  $dragon->view($file, $data);
    }

    /**
     * @return string
     */
    abstract public function getTitle();

}
