<?php

namespace Dragon\Table;
use Dragon\Helper\Table;

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

class UserData extends Table
{

    protected $name = 'user_date';

    protected $version = 1;

    /**
     * @inheritDoc
     */
    protected function set_schema()
    {
        $this->schema = "`ID` bigint(20) NOT NULL AUTO_INCREMENT,
                          `user_id` bigint(20) unsigned NOT NULL,
                          `uid` varchar (10) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phone number until username is not phone number',
                         `gander` varchar(15) DEFAULT NULL COMMENT '1 => male | 0 => female | null => Unset',
                         `birthday` date DEFAULT NULL,
                         `rate` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Teacher Rate',
                         `login_count` mediumint(8) unsigned NOT NULL,
                         `last_login` datetime NOT NULL,
                         `wallet` int(10) NOT NULL DEFAULT 0,
                         `score` int(10) unsigned NOT NULL DEFAULT 0,
                         `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `telegram_token` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `created_at` datetime NOT NULL,
                          `updated_at` datetime NOT NULL,
                          `deleted_at` datetime NOT NULL,
                          PRIMARY KEY (`ID`),
                          KEY `user_id` (`user_id`),
                          KEY `phone` (`phone`),
                          KEY `gander` (`gander`)";
    }

    /**
     * @inheritDoc
     */
    protected function set_upgrade()
    {
        // TODO: Implement set_upgrade() method.
    }
}
