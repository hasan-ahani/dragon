<?php

namespace Dragon\Table;
/**
 * @package     : Dragon\Table
 * @name        : TelegramChat.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class TelegramChat extends \Dragon\Helper\Table
{

    protected $name = 'telegram_chat';

    protected $version = 1;

    /**
     * @inheritDoc
     */
    protected function set_schema()
    {
        $this->schema = "`ID` bigint(20) NOT NULL AUTO_INCREMENT,
                          `chat_id` bigint(20) unsigned NOT NULL,
                          `token` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `created_at` datetime NOT NULL,
                          `updated_at` datetime NOT NULL,
                          `deleted_at` datetime NOT NULL,
                          PRIMARY KEY (`ID`),
                          KEY `chat_id` (`chat_id`)";
    }

    /**
     * @inheritDoc
     */
    protected function set_upgrade()
    {
        // TODO: Implement set_upgrade() method.
    }
}
