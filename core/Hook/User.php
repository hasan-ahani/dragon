<?php

namespace Dragon\Hook;
/**
 * @package     : Dragon\Hook
 * @name        : Auth.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-27
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class User extends \Dragon\Helper\Hook
{

    public function register()
    {
        $this->action('wp_login', 'update_user_data', 10 ,2);
        $this->filter('get_avatar', 'update_user_data', 1 , 5 );
        $this->filter('get_avatar_url', 'get_avatar_url',  1 , 5);

    }

    public function get_avatar($id_or_email, $size = 96, $default = '', $alt = '', $args = null )
    {
        $user = dg_get_user($id_or_email);
        $avatar = $this->get_avatar_url($user);
        return sprintf(
            "<img src='%s' class='avatar avatar-%d' height='%d' width='%d' alt='%s' />",
            $avatar,
            $size,
            $size,
            $size,
            $user->display_name);
    }

    public function get_avatar_url( $id_or_email, $args = null)
    {

        $user = dg_get_user($id_or_email);

        if ($user->avatar){

            return $user->avatar;
        }


        return '';

    }

    public function update_user_data(string $user_login, \WP_User $user)
    {
        $query = dragon()->query()->table('user_data');
        $query->where('user_id', $user->ID);

        $data = [
            'last_login' => dg_time(),
            'updated_at' => dg_time(),
        ];

        if (!$query->one()){
            $data['user_id']        = $user->ID;
            $data['created_at']     = dg_time();
        }

        $query->updateOrInsert($data);
    }
}
