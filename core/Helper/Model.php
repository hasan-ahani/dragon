<?php

namespace Dragon\Helper;

/**
 * @package     : Dragon\Helper
 * @name        : Model.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-11
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract class Model
{


    private static $instance = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID';


    protected $data = [];


    public function set($object)
    {
        if ($object){
            foreach (get_object_vars($object) as $key => $value ){
                if (is_object($value)){
                    foreach ($value as $ckey => $cValue){
                        $this->data[$ckey] = $cValue;
                    }
                }else{

                    $this->data[$key] = $value;
                }

            }
        }
    }


    /**
     * @param ...$args
     * @return
     */
    public static function getInstance(...$args) {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class(...$args);
        }
        return self::$instance;
    }



    protected function get($object_id)
    {
        $query = self::query();
        $query->table($this->table);
        $query->where($this->primaryKey, $object_id);
        $object = $query->one();

        if (!$object){
            return $object;
        }
        return $this->__construct($object);
    }


    public function __get($key)
    {
        return $this->data[$key];
    }


    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function toArray()
    {
        return $this->data;
    }

    protected function getTableName()
    {
        return $this->table;
    }

    public function query($clean = false)
    {
        global $dragon;
        $query = $dragon->query();
        if (!$clean){
            $query->table($this->table);
        }
        return $query;
    }



    public function __toString()
    {
        return $this->data;
    }

    /**
     * @param $name
     * @param $arguments
     * @return $this
     */
    public function __call($name , $arguments)
    {
        if (strpos($name, 'set') === 0){

            $name = str_replace('set', '', $name);
            $name = preg_split('/(?=[A-Z])/',$name);
            $name = array_filter($name);
            $name = implode('_', $name);
            $name = strtolower($name);

            if (isset($arguments[0])){
                $this->$name = $arguments[0];
            }

        }

        return $this;

    }

    /**
     * @param string|int $code    Error code.
     * @param string     $message Error message.
     * @param mixed      $data    Optional. Error data.
     * @return \WP_Error
     */
    protected function error($code = '', $message = '', $data = ''): \WP_Error
    {
        return new \WP_Error($code, $message, $data);
    }


    public function save()
    {

    }

    public function delete()
    {

    }


}
