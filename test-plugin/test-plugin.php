<?php      
/*
Plugin Name: Test Plugin
Plugin URI: http://wordpress-life.ru/kak-dobavit-menyu-pri-sozdanii-plagina.html
Description: Тестовый плагин.
Version: 1.0
Author: Alexey Yershov
Author URI: http://wordpress-life.ru
*/

/*  Copyright 2013  Alexey Yershov  (email: yershov.alexey@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', 'test_plugin_add_top_menu');
add_action('admin_menu', 'test_plugin_add_submenu_about');
add_action('admin_menu', 'test_plugin_add_submenu_options');

function test_plugin_add_top_menu() {
    add_menu_page( 'Мой плагин', 'Мой плагин', 'manage_options', 
    'test-plugin/admin.php', '', plugins_url( '/images/wp-icon.png', __FILE__ ) );
}

function test_plugin_add_submenu_about() {
    add_submenu_page('test-plugin/admin.php', 'О плагине', 'О плагине', 'manage_options', 'test-plugin/about.php');
}

function test_plugin_add_submenu_options() {
    add_options_page('Мой плагин', 'Мой плагин', 'manage_options', 'test-plugin/admin.php');
}

?>