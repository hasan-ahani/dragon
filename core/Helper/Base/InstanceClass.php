<?php

namespace Dragon\Helper\Base;
/**
 * @package     : Dragon\Helper\Base
 * @name        : InstanceClass.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-03-02
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

Trait InstanceClass
{


    /**
     * Instance Of Class
     *
     * @var $instance
     */
    private static $instance = false;



    /**
     * class Data Variable
     *
     * @var array $data
     */
    protected array $data = [];


    /**
     * get Instance Of Class
     *
     *
     * @retun $this
     */
    public static function getInstance(...$args) {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class(...$args);
        }
        return self::$instance;
    }


    /**
     * get data
     *
     *
     * @retun mixed
     */
    public function __get($key)
    {
        return $this->data[$key] ?? false;
    }


    /**
     * set data
     *
     *
     * @retun $this
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }




}
