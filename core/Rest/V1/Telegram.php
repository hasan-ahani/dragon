<?php

namespace Dragon\Rest\V1;
/**
 * @package     : Dragon\Rest\V1
 * @name        : Telegram.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-01-27
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();

class Telegram extends \Dragon\Helper\Rest
{

    public $permission_token = '0piI8j3LqWI1Ea3Bs8HdENTTm9qEZ50Z';
    public $token = '5184737464:AAGJIynFRhBQb64dY3OL_572tuxkyVD3i_c';

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->register_route([
            $this->route( array($this, 'index'), parent::POST, array($this, 'permission')),
        ]);

        $this->register_route([
            $this->route(array($this, 'send'), parent::POST,  array($this, 'permission')),
        ],
        'send-message'
        );


        $this->register_route([
            $this->route(array($this, 'setWebHook'), parent::GET,  array($this, 'permission')),
        ],
            'hook'
        );
    }

    /**
     * telegram api permission
     * @return bool|void
     */
    public function permission()
    {
        return isset($_REQUEST['permission_token']) && sanitize_text_field($_REQUEST['permission_token']) == $this->permission_token;
    }

    public function index()
    {
        global $dragon;
        $telegram = new \Telegram($this->token, false);
        $chat_id = $telegram->ChatID();
        $result = $telegram->getData();
        $text = $result['message']['text'];

        if ($text == '/token'){
            $query = $dragon->query();
            $query->table('telegram_chat');
            $query->where('chat_id', $chat_id);
            $chat = $query->one();
            $token = substr(strtolower( md5( uniqid() ) ), 0,15);


            if ($chat){
                $token = $chat->token;
            }else{

                $insert = $query->insert([
                    'chat_id' => $chat_id,
                    'token' => $token,
                    'created_at' => current_time('mysql'),
                ]);


                if (!$insert){
                    return $this->error('not_insert', 'not insert');
                }


            }

            $msg = 'Your Access Token:' .PHP_EOL.PHP_EOL;
            $msg .= "<code>{$token}</code>";
            $content = array('chat_id' => $chat_id, 'parse_mode' => 'html', 'text' => $msg);
            $telegram->sendMessage($content);

        }

    }

    public function send()
    {
        global $dragon;
        $to = isset($_REQUEST['to']) ? sanitize_text_field($_REQUEST['to']) : false;
        $message = isset($_REQUEST['message']) ? wp_kses_post($_REQUEST['message']) : false;


        if (!$to){
            return $this->error('to_required', 'To is Required');
        }

        if (!$message){
            return $this->error('message_required', 'Message is Required');
        }


        $query = $dragon->query()->table('telegram_chat');
        $query->where('token', $to);
        $chat = $query->one();

        if (!$chat){
            return $this->error('invalid_to_address', 'Invalid To address');
        }


        $telegram = new \Telegram($this->token, false);

        $content = array('chat_id' =>  $chat->chat_id,  'parse_mode' => 'HTML', 'text' => $message);
        $send = $telegram->sendMessage($content);

        if (isset($send['result'])){
            $query = $dragon->query()->table('telegram_message');
            $query->insert([
               'message'    => $message,
               'chat_id'    => $chat->chat_id,
               'created_at'    => current_time('mysql'),
            ]);
            $this->set('result', $send['result']);
        }
        return $this->response('Message Send');
    }

    public function setWebHook()
    {
        $telegram = new \Telegram($this->token);
        $url = add_query_arg(
            [
                'permission_token' => $this->permission_token
            ],
            $this->getUrl()
        );

        $hook = $telegram->setWebhook($url);
        $this->set('hook', $hook);
        $this->set('url', $url);
        return $this->response();
    }

}
