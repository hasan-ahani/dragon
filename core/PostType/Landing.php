<?php

namespace Dragon\PostType;
/**
 * @package     : Dragon\PostType
 * @name        : Landing.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Landing extends \Dragon\Helper\PostType
{

    protected string $type = 'landing';

    protected array $args = [
        'capability_type'   => 'page',
    ];

    public function init()
    {
    }
}
