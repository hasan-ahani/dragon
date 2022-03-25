<?php

namespace Dragon\Table;
/**
 * @package     : Dragon\Table
 * @name        : UserDataTable.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-03-05
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class UserDataTable extends \BerlinDB\Database\Table
{
    protected $name = 'user_data';

    protected $version = '1.0.0';

    protected $description = 'User Data';

    protected $upgrades = [];

    /**
     * @inheritDoc
     */
    protected function set_schema()
    {
        $this->schema = "
             `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
             `user_id` bigint(20) unsigned NOT NULL,
             `uid` varchar (10) COLLATE utf8mb4_unicode_ci NOT NULL,
             `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
             `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
             `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
             `gander` tinyint(1) DEFAULT NULL ,
             `birthday` date DEFAULT NULL,
             `login_count` mediumint(8) unsigned NOT NULL,
             `last_login` datetime NOT NULL,
             `wallet` int(10) NOT NULL DEFAULT 0,
             `payment_count` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT 'Total Payment Count',
             `payment_amount` int(10) unsigned NOT NULL DEFAULT 0 COMMENT 'Total Purchased amount',
             `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
             `email_verify` tinyint(1) DEFAULT 0,
             `phone_verify` tinyint(1) DEFAULT 0,
             `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
             `updated_at` datetime NOT NULL,
             PRIMARY KEY (`ID`),
             KEY `user_id` (`user_id`),
             KEY `phone` (`phone`),
             UNIQUE (user_id)
        ";
    }
}
