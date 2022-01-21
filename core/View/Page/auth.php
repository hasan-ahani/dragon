<?php
/**
 * @name        : auth.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

get_header();
?>
    <form class="ajax" action="auth.php" method="post">

        <input type="text" name="tset">
        <button type="submit">test</button>
    </form>
<?php
get_footer();
