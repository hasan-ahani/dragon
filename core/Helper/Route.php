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

    protected $slug =   '';

    /**
     * register route
     */
    public function register()
    {

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
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return apply_filters("dragon_route_{$this->slug}", $this->slug);
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

}
