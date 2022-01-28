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
    protected $name = '';

    /**
     * rest base route
     * @var string
     */
    protected $namespace = 'dragon';

    /**
     * success result array
     * @var array
     */
    private $result = [
        'success'     => 1,
        'message'     => 'ok',
    ];


    /**
     * @var string
     */
    private $suffix;

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
     * @param bool $public permission
     * @return $this
     */
    protected function register_route(array $args, $route = false, $public = false)
    {

        if (is_string($route) && strpos( $route, '/') !== 0){
            $route = '/' . $route;
        }

        $default = [
            'methods'               => self::GET,
            'permission_callback' 	=> $public ? '__return_true' :  array($this, 'permission'),
        ];

        if (!isset($args['callback']) && count($args) > 1){



            $args = array_map(function ($route) use ($public) {

                $public = isset($route['public']) ? boolval($route['public']) : $public;
                $default = [
                    'methods'               => self::GET,
                    'permission_callback' 	=> $public ? '__return_true' :  array($this, 'permission'),
                ];
                return array_merge($default , $route);
            },$args);
        }else{

            $args = array_merge($default , $args);
        }

        $namespace = $this->namespace;

        if($this->suffix){
            $namespace .= '/' . $this->suffix;
        }

        register_rest_route($namespace,$this->name . $route, $args);
        return $this;
    }

    /**
     * make route array
     * @param string $methods
     * @param $callback
     * @param false $permission_or_public
     * @return array
     */
    public function route($callback , $methods = self::GET, $permission_or_public = false)
    {

        $arr = [
            'methods'   => $methods,
            'callback'   => $callback,
        ];

        if (is_array($permission_or_public)){
            $arr['permission_callback'] = $permission_or_public;
        }else{
            $arr['public'] = $permission_or_public;
        }

        return $arr;

    }

    public function permission()
    {
        return is_user_logged_in();
    }

    /**
     * access denied
     * @param array|string|int $data
     * @return \WP_Error
     */
    protected function access_denied( $data = ''): \WP_Error
    {
        return new \WP_Error('access_denied', __('Access Denied', DRAGON_I118), $data);
    }


    /**
     * @param string $key
     * @param string|int|array|float $value
     * @return $this
     */
    public function set(string $key , $value)
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
    public function error(string $code, string $message , $data = ''): \WP_Error
    {
        return new \WP_Error($code, $message, $data);
    }

    /**
     * @param false $route
     * @return string
     */
    public function getUrl($route = false)
    {
        $namespace = $this->namespace;

        if($this->suffix){
            $namespace .= '/' . $this->suffix;
        }

        $namespace .= '/' . $this->name;
        if ($route){

            $namespace .= '/' . $route;
        }
        return get_rest_url(null, $namespace );
    }

    /**
     * @param $cap
     * @return bool
     */
    public function canAccess($cap)
    {
        return is_user_logged_in() && current_user_can($cap);
    }
}
