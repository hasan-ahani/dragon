<?php

namespace Dragon\Helper;
/**
 * @package     : Dragon\Helper
 * @name        : Route.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract class Route
{

    /**
     * slug path page
     * @var string
     */
    protected $slug =   '';

    /**
     * in front
     * @var bool
     */
    protected $front = true;

    /**
     * parent menu admin
     * @var string
     */
    protected $parent =   '';



    /**
     * register route
     */
    public function register()
    {

        if ($this->front){
            if ($this->getSlug()){
                add_action( 'init', array( $this, 'rewriteRule' ) );
                add_filter( 'query_vars', array( $this, 'queryVars' ) );
            }

            if (method_exists($this, 'template') && $this->isCurrentRoute() ){
                add_filter( 'template_include', array( $this, 'template' ), 99 );
            }

            if (method_exists($this, 'redirect') && $this->isCurrentRoute() ){
                add_action( 'template_redirect', array( $this, 'redirect' ), 99 );
            }

            if (method_exists($this, 'title') && $this->isCurrentRoute() ){
                add_filter( 'wp_title', array( $this, 'title' ), 99 );
            }

            if (method_exists($this, 'enqueue') && $this->isCurrentRoute() ){
                add_action( 'wp_enqueue_scripts', array($this , 'enqueue'), 99 );
            }

            if (method_exists($this, 'init') && $this->isCurrentRoute() ){
                $this->init();
            }
        }else{
            add_action( 'admin_menu', [$this , 'admin_page'] );

            if (method_exists($this, 'enqueue') && $this->isCurrentAdminRoute() ){
                add_action( 'admin_enqueue_scripts', array($this , 'enqueue'), 99 );
            }
        }

    }

    /**
     * @return string
     */
    public function getSlug()
    {
        if (!$this->slug) return false;

        return apply_filters("dragon_route_{$this->slug}", $this->slug);
    }

    public function admin_page()
    {
        add_submenu_page(
            $this->parent,
            $this->title(),
            $this->title(),
            'manage_options',
            $this->slug,
            [$this, 'template'],
            90 );

    }

    /**
     * register route
     */
    public function rewriteRule()
    {
        add_rewrite_rule(
            '^' . $this->getSlug() . '/?(([^/]+)/)?+',
            'index.php?' . $this->getSlug() . '=true',
            'top'
        );
    }

    /**
     * @param $vars
     * @return mixed
     */
    public function queryVars($vars )
    {
        $vars[] = $this->getSlug();
        return $vars;
    }

    /**
     * @return bool
     */
    public function isCurrentRoute(): bool
    {
        return strpos( $_SERVER['REQUEST_URI'],  '/' . $this->getSlug() ) === 0;
    }

    /**
     * @return bool
     */
    public function isCurrentAdminRoute(): bool
    {
        return strpos( $_SERVER['REQUEST_URI'],  '/wp-admin' ) === 0 &&
                isset($_GET['page']) && $_GET['page'] == $this->getSlug();
    }

    public function emptyFrontTemplate($content = '')
    {
        get_header();

        echo $content;

        get_footer();
    }

}
