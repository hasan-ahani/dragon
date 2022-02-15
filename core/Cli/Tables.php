<?php

namespace Dragon\Cli;
use Dragon\Helper\Cli;
use Dragon\Install\Activation;
use WP_CLI;

/**
 * @package     : Dragon\Cli
 * @name        : MigrateCommands.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-13
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Tables extends Cli
{

    public function migrate($args, $assoc_args)
    {

        $activation = new Activation();
        $activation->activate();

        WP_CLI::success( "All migrations ran" );
    }

    public function drop()
    {

        $activation = new Activation();
        $activation->deactivate();

        WP_CLI::success( "All tables drop" );

    }

    public function seed()
    {

    }
}
