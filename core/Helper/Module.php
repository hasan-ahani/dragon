<?php

namespace Dragon\Helper;
/**
 * @package     : Dragon\Helper
 * @name        : Module.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-25
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

abstract class Module
{
    abstract public function name();
    abstract public function key();



}
