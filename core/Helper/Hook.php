<?php

namespace Dragon\Helper;
/**
 * @name        : Hook.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract Class Hook
{


    abstract public function register();


    /**
     * @param $hook_name
     * @param $callback string|array
     * @param int $priority
     * @param int $accepted_args
     * @return bool
     */
    public function filter($hook_name, $callback, $priority = 10, $accepted_args = 1 ): bool
    {
        if (!is_array($callback)){
            $callback = [$this, $callback];
        }

        add_filter($hook_name, $callback , $priority, $accepted_args);
        return true;
    }


    /**
     * @param $hook_name
     * @param $callback string|array
     * @param int $priority
     * @param int $accepted_args
     * @return bool
     */
    public function action($hook_name, $callback, $priority = 10, $accepted_args = 1 ): bool
    {
        if (!is_array($callback)){
            $callback = [$this, $callback];
        }

        add_action($hook_name, $callback , $priority, $accepted_args);
        return true;
    }

}
