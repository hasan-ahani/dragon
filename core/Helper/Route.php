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

        if ($this->slug){
            add_action( 'init', array( $this, 'rewriteRule' ) );
            add_filter( 'query_vars', array( $this, 'queryVars' ) );
        }

        if (method_exists($this, 'template') && $this->isCurrentRoute() ){
            add_filter( 'template_include', array( $this, 'template' ), 99 );
        }

        if (method_exists($this, 'redirect') && $this->isCurrentRoute() ){
            add_action( 'template_redirect', array( $this, 'redirect' ), 99 );
        }
    }

    /**
     * register route
     */
    public function rewriteRule()
    {
        add_rewrite_rule(
        #'^' . $this->panelSlug . '/?+',
            '^' . $this->slug . '/?(([^/]+)/)?+',
            'index.php?' . $this->slug . '=true',
            'top'
        );
    }

    /**
     * @param $vars
     * @return mixed
     */
    public function queryVars($vars )
    {
        $vars[] = $this->slug;
        return $vars;
    }

    /**
     * @return bool
     */
    public function isCurrentRoute(): bool
    {
        return strpos( $_SERVER['REQUEST_URI'],  '/' . $this->slug ) === 0;
    }

}
