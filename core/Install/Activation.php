<?php

namespace Dragon\Install;

/**
 * @package     : Dragon
 * @name        : Activation.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Activation
{


    public function switchTheme($old_theme_name, $old_theme)
    {
        if ($old_theme_name == 'dragon'){
            //$this->deactivate();
        }else{
            $this->activate();
        }
    }

    /**
     * @return object
     */
    public function tables()
    {
        global $wpdb;
        $prefix = $wpdb->prefix;

        $arr = [
            'user_data'     => "{$prefix}user_data",
            'post_data'     => "{$prefix}post_data",
            'notification'  => "{$prefix}notification",
            'email_queue'   => "{$prefix}email_queue",
        ];

        return (object) $arr;
    }




    /**
     * active plugin
     */
    public function activate()
    {
        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }
        $tables = $this->tables();

        $collate = 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';

        $schemas = [
            "
            CREATE TABLE IF NOT EXISTS `{$tables->user_data}` (
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
            ) $collate ",
            "
            CREATE TABLE IF NOT EXISTS `{$tables->email_queue}` (
             `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
             `email` varvhar(100) DEFAULT NULL ,
             `content` longtext DEFAULT NULL ,
             `gander` tinyint(1) DEFAULT NULL ,
             `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
             `updated_at` datetime NOT NULL,
             PRIMARY KEY (`ID`),
            ) $collate "
        ];


        foreach ($schemas as $schema){
            dbDelta($schema);
        }

        /**
         * dragon activate hook
         */
        do_action('dragon_activate');

        flush_rewrite_rules();
    }


    /**
     * deactivate plugin
     */
    public function deactivate()
    {
        global $wpdb;
        $tables = $this->tables();

        if ($tables){
            foreach ($tables as $table){

                $sql = "DROP TABLE IF EXISTS $table";
                $wpdb->query($sql);

            }
        }


        /**
         * dragon plugin deactivate hook
         */
        do_action('dragon_deactivate');


        flush_rewrite_rules();
    }
}
