<?php
/*
 * Plugin Name: Live 2D
 * Plugin URI: 
 * Description: 看板娘插件
 * Version: 1.0
 * Author: jiangweifang
 * Author URI: https://5ri.org
 * License: MIT
 */
//定义css根目录
define( 'CSS', plugin_dir_url( __FILE__ ) . 'assets/' );
//定义js根目录
define( 'JS', plugin_dir_url( __FILE__ ) . 'assets/' );
// 停用插件
register_deactivation_hook(__FILE__, 'live_2d_stop');
function live_2d_stop ()
{
	
}
?>