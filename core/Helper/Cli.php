<?php

namespace Dragon\Helper;
/**
 * @package     : Dragon\Helper
 * @name        : Cli.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-13
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();


use Dragon\Cli\Tables;
use WP_CLI;
use WP_CLI_Command;

abstract class Cli extends WP_CLI_Command
{

    public function register()
    {

        WP_CLI::add_command( 'tables', 'Dragon\Cli\Tables');
    }

}
