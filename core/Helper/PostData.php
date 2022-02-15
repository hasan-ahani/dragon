<?php

namespace Dragon\Helper;
use MongoDB\Driver\Query;

/**
 * @package     : Dragon\Helper
 * @name        : PostData.php
 * @version     : 1.0
 * @author      : Hasan Ahani
 * @date        : 2022-02-12
 * @website     : https://wptool.co
 * @license     : GPLv2 or later https://wptool.co/license
 */
defined('ABSPATH') or exit();


/**
 * @property int ID
 * @property string post_title
 * @property int post_author
 * @property string post_date
 * @property string post_date_gmt
 * @property string post_content
 * @property string post_excerpt
 * @property string post_status
 * @property string comment_status
 * @property string ping_status
 * @property string post_password
 * @property string post_name
 * @property string to_ping
 * @property string pinged
 * @property string post_modified
 * @property string post_modified_gmt
 * @property string post_content_filtered
 * @property int post_parent
 * @property int guid
 * @property int menu_order
 * @property string post_type
 * @property string post_mime_type
 * @property string comment_count
 * @property string filter
 *
 * @method setPostTitle(string $title)
 * @method setPostAuthor(int $user_id)
 * @method setPostContent(string $content)
 */
abstract class PostData extends Model
{

    protected $post_type = 'post';




}
