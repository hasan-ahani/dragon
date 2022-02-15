<?php

namespace Dragon\Model;
use Dragon\Helper\Model;

/**
 * @package     : Dragon\Model
 * @name        : User.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-21
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();


/**
 *
 *
 * @since 2.0.0
 *
 * @property int    $ID
 * @property string $uid
 * @property string $nickname
 * @property string $description
 * @property string $user_description
 * @property string $first_name
 * @property string $user_firstname
 * @property string $last_name
 * @property string $user_lastname
 * @property string $phone
 * @property string $user_login
 * @property string $user_pass
 * @property string $user_nicename
 * @property string $user_email
 * @property string $user_url
 * @property string $gander
 * @property string $birthday
 * @property string $user_registered
 * @property string $user_activation_key
 * @property string $user_status
 * @property int    $user_level
 * @property string $display_name
 * @property int    $payment_count
 * @property int    $payment_amount
 * @property int    $wallet
 * @property int    $login_count
 * @property string $last_login
 * @property string $avatar
 * @property int    $email_verify
 * @property int    $phone_verify
 * @property string $spam
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted
 * @property string $locale
 * @property string $rich_editing
 * @property string $syntax_highlighting
 * @property string $use_ssl
 */
class User extends Model
{

    protected $table = 'user_data';


    public function __construct($id = 0)
    {
        if ($id instanceof \WP_User ){
            $this->__set('user', $id);
        }
        if (!$id){
            $id = get_current_user_id();
        }

        $user = get_userdata($id);
        if ($user){

//            $this->__set('user', $user);
            $user_data = wp_cache_get($id, 'dragon_user_data');
            if ($user_data){
                $this->set($user_data);
            }else{
                $query = $this->query();
                $query->where('user_id', $id);
                $user_data = $query->one();
                wp_cache_set($id, $user_data, 'dragon_user_data');
                $this->set($user_data);
            }

            $this->set($user);


            return $this;
        }
    }

}
