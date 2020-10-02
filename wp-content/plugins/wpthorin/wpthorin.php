<?php
/**
 * @package PluginThorin
 */
/*
Plugin Name: WPThorin
Plugin URI: https://wismenmedia.se
Description: Videogalleri för Studio Konkret. Thorins första WP-plugin!
Version: 1.0.0
Author: Gustav "Thorin" Persson
Author URI: https://github.com/ThorinEk
License: GPLv2 or later
Text Domain: wpthorin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( ! defined( 'ABSPATH')){
    die;
}

class WPThorin{
    //Metoder
    function __construct(){
        add_action( 'init', array($this, 'custom_post_type'));
    }
    function activate(){
        // generated a CPT
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate(){
        //flush rewrite rules
    }
    function uninstall(){
        // delete CPT
        // delete all the plugin data from the DB
    }

    function custom_post_type(){
        register_post_type('book', ['public' => true, 'label' => 'Böcker']);
    }
}

if (class_exists('WPThorin')){
    $wpThorin = new WPThorin();
}

//activation
    register_activation_hook(__FILE__, array($wpThorin, 'activate'));
//deactivation
    register_deactivation_hook(__FILE__, array($wpThorin, 'deactivate'));

//uninstall