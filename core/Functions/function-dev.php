<?php
/**
 * @name        : function-dev.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-22
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

function logText( $text ){
    $logFile = fopen( ABSPATH . '/logtext.txt', 'a' );
    fwrite( $logFile, current_time( 'mysql' ) . ': ' . print_r( $text, true ) . PHP_EOL );
    fclose( $logFile );
}
