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
    protected string $type     = '';

    /**
     * post type labels
     * @var array
     */
    protected array $labels   = [];


    /**
     * post type args
     * @var array
     */
    protected array $args     = [];


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

        $args = [] ;


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
            'name'                  => _x( $plural, 'post type general name', DRAGON_I118 ),
            'singular_name'         => _x( $single, 'post type singular name', DRAGON_I118 ),
            'add_new'               => _x( 'Add New', $single , DRAGON_I118),
            'add_new_item'          => __( 'Add New ' . $single, DRAGON_I118 ),
            'edit_item'             => __( 'Edit ' . $single, DRAGON_I118 ),
            'new_item'              => __( 'New ' . $single, DRAGON_I118 ),
            'view_item'             => __( 'View ' . $single , DRAGON_I118),
            'search_items'          => __( 'Search ' . $plural, DRAGON_I118 ),
            'not_found'             =>  __( 'No ' . $plural . ' found' , DRAGON_I118),
            'not_found_in_trash'    => __( 'No ' . $plural . ' found in Trash', DRAGON_I118 )
        );

        $args['labels'] = array_merge( $labels, $this->labels );


        register_post_type( $this->type, $args );
    }
}
