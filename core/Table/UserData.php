<?php

namespace Dragon\Table;
/**
 * @package     : Dragon\Table
 * @name        : UserData.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class UserData extends \Dragon\Helper\Table
{

    protected string $name = 'user_date';

    protected int $version = 1;

    /**
     * @inheritDoc
     */
    protected function set_schema()
    {
        $this->schema = "`ID` bigint(20) NOT NULL AUTO_INCREMENT,
                          `user_id` bigint(20) unsigned NOT NULL,
                          `created_at` datetime NOT NULL,
                          `updated_at` datetime NOT NULL,
                          `deleted_at` datetime NOT NULL,
                          PRIMARY KEY (`ID`),
                          KEY `user_id` (`user_id`)";
    }

    /**
     * @inheritDoc
     */
    protected function set_upgrade()
    {
        // TODO: Implement set_upgrade() method.
    }
}
