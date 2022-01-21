<?php

namespace Dragon\Helper;
/**
 * @package     : Dragon\Helper
 * @name        : PostType.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract class PostType
{


    /**
     * post type
     * @var string
     */
    protected $type     = '';

    /**
     * post type labels
     * @var array
     */
    protected $labels   = [];


    /**
     * post type args
     * @var array
     */
    protected $args     = [];


    /**
     * register post type
     */
    public function register()
    {

        if (method_exists($this, 'init')){
            $this->init();
        }


        if ($this->type){
            add_action('init', array($this, 'register_post_type'));
        }
    }

    /**
     * register post type
     */
    public function register_post_type()
    {

        $defaults = array(
            'public'            => true,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'capability_type'   => 'post',
            'rewrite'           => array( 'slug' => $this->type ),
            'supports'          => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail' , 'slug'  , 'revisions' ),
        );

        $args = array_merge( $defaults, $this->args );


        $plural = ucfirst($this->type) . 's';
        $single = ucfirst($this->type);
        $labels = array(
            'name'                  => $plural,
            'singular_name'         => $single,
        );

        $args['labels'] = array_merge( $labels, $this->labels );


        register_post_type( $this->type, $args );
    }
}
