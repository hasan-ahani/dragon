<?php

namespace Dragon\Helper;
/**
 * @package     : Dragon\Helper
 * @name        : Rest.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract class Rest extends \WP_REST_Request
{

    /**
     * method get
     */
    const GET       = 'get';


    /**
     * method post
     */
    const POST      = 'post';


    /**
     * method patch
     */
    const PATCH     = 'patch';


    /**
     * method put
     */
    const PUT       = 'put';


    /**
     * method delete
     */
    const DELETE    = 'delete';

    /**
     * rest base route
     * @var string
     */
    protected string $name = '';

    /**
     * success result array
     * @var array
     */
    private array $result = [
        'success'     => 1,
        'message'     => 'ok',
    ];


    /**
     * @var string
     */
    private string $suffix;

    public function __construct($name , $suffix = 'v1')
    {
        if ($suffix){
            $this->suffix = $suffix;
        }

        if (!$this->name && $name){
            $this->name = $name;
        }

        parent::__construct();
    }


    /**
     * register routes
     */
    abstract public function register();


    /**
     * @param array $args
     * @param bool|string $route
     * @return $this
     */
    protected function register_route(array $args, bool|string $route = false): static
    {

        $namespace =  'dragon';

        if($this->suffix){
            $namespace .= '/' . $this->suffix;
        }
        register_rest_route($namespace,$this->name . $route, $args);
        return $this;
    }

    /**
     * access denied
     * @param array|string|int $data
     * @return \WP_Error
     */
    protected function access_denied(array|string|int $data = ''): \WP_Error
    {
        return new \WP_Error('access_denied', __('Access Denied', DRAGON_I118), $data);
    }


    /**
     * @param string $key
     * @param string|int|array|float $value
     * @return $this
     */
    public function set(string $key ,string|int|array|float $value): static
    {
        $this->result[$key] = $value;
        return $this;
    }


    /**
     * @param string $message
     * @return array
     */
    public function response(string $message = 'ok'): array
    {
        $this->result['message']    = $message;
        return $this->result;
    }


    /**
     * @param string $code
     * @param string $message
     * @param string|array|int $data
     * @return \WP_Error
     */
    public function error(string $code, string $message , string|array|int $data = ''): \WP_Error
    {
        return new \WP_Error($code, $message, $data);
    }
}
