<?php
/*
 * Plugin Name: Live 2D
 * Plugin URI: https://5ri.org
 * Description: 看板娘插件
 * Version: 1.0
 * Author: jiangweifang
 * Author URI: https://5ri.org
 * License: MIT
 */
//定义css根目录
define( 'assets', plugin_dir_url( __FILE__ ) . 'assets/' );

//添加样式

function live2D_style(){
	wp_enqueue_style( 'waifu_css' ,assets . "waifu.css");//css
	wp_enqueue_script( 'jquery');//js
	wp_enqueue_script( 'jquery-ui' ,assets.'jquery-ui.min.js');//js
   wp_enqueue_script( 'waifu-tips_js' ,assets.'waifu-tips.js');//js
	wp_enqueue_script( 'live2d_js' ,assets.'live2d.js');//js
	
}
add_action( 'init', 'live2D_style' );
add_action( 'wp_footer', 'live2D_DefMod' );
function live2D_DefMod(){
	echo '<div class="waifu">
        <div class="waifu-tips"></div>
        <canvas id="live2d" class="live2d"></canvas>
        <div class="waifu-tool">
            <span class="fui-home"></span>
            <span class="fui-chat"></span>
            <span class="fui-eye"></span>
            <span class="fui-user"></span>
            <span class="fui-photo"></span>
            <span class="fui-info-circle"></span>
            <span class="fui-cross"></span>
        </div>
    </div>';
	echo '<script type="text/javascript">
        /* 可直接修改部分参数 */
        live2d_settings["modelId"] = 1;                  // 默认模型 ID
        live2d_settings["modelTexturesId"] = 87;         // 默认材质 ID
        live2d_settings["modelStorage"] = false;         // 不储存模型 ID
        live2d_settings["canCloseLive2d"] = false;       // 隐藏 关闭看板娘 按钮
        live2d_settings["canTurnToHomePage"] = false;    // 隐藏 返回首页 按钮
        live2d_settings["waifuSize"] = "600x535";        // 看板娘大小
        live2d_settings["waifuTipsSize"] = "570x150";    // 提示框大小
        live2d_settings["waifuFontSize"] = "30px";       // 提示框字体
        live2d_settings["waifuToolFont"] = "36px";       // 工具栏字体
        live2d_settings["waifuToolLine"] = "50px";       // 工具栏行高
        live2d_settings["waifuToolTop"] = "-60px";       // 工具栏顶部边距
        live2d_settings["waifuDraggable"] = "axis-x";    // 拖拽样式
        /* 在 initModel 前添加 */
        initModel("'. assets .'waifu-tips.json?v=1.4.2")
    </script>';
}

// 停用插件
register_deactivation_hook(__FILE__, 'live_2d_stop');
function live_2d_stop ()
{
	
}


// 在导航栏“设置”中添加条目
function live2D_add_setting_page ()
{
	add_options_page('Live2D 设置', 'Live2D 设置', 'manage_options', __FILE__, 'live2D_setting_page');
}

add_action('admin_menu', 'live2D_add_setting_page');

function live2D_setting_page ()
{
}

?>