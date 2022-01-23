<?php
/**
 * @name        : header
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php wp_title( ); ?></title>

    <link rel="preconnect" href="https://accounts.google.com">
    <link rel="manifest" href="/manifest.json">

    <?php

    /**
     * user wp_head function
     */
    wp_head();
    ?>
</head>
<body <?php body_class();?>>

<?php
do_action('dragon_start_body');
?>
<header>

</header>
