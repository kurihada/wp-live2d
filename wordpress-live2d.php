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
//定义目录
define( 'LIVE2D_ASSETS', plugin_dir_url( __FILE__ ) . 'assets/' );//资源目录
define('LIVE2D_BASEFOLDER', plugin_basename(dirname(__FILE__)));//基础目录
define('LIVE2D_SETTINGPAGE', plugin_basename(__FILE__));//设置页面

//添加样式（初始化）

function live2D_style(){
	wp_enqueue_style( 'waifu_css' ,LIVE2D_ASSETS . "waifu.css");//css
	wp_enqueue_script( 'jquery');//js
	wp_enqueue_script( 'jquery-ui' ,LIVE2D_ASSETS.'jquery-ui.min.js');//js
   wp_enqueue_script( 'waifu-tips_js' ,LIVE2D_ASSETS.'waifu-tips.js');//js
	wp_enqueue_script( 'live2d_js' ,LIVE2D_ASSETS.'live2d.js');//js
	
}
add_action( 'get_header', 'live2D_style' );

// 启用插件
register_activation_hook( __FILE__, 'live_2d_install' );
function live_2d_install()
{
	
}

// 停用插件
register_deactivation_hook(__FILE__, 'live_2d_stop');
function live_2d_stop ()
{
	
}
// 加载设置组件
require(dirname(__FILE__)  . '/live2d-options.php');

// 实例化设置组件
if ( is_admin() ){
	$live_2d_ = new LiveD();
}

//进行设置
function live2D_DefMod(){
// Retrieve this value with:
$live_2d__options = get_option( 'live_2d__option_name' ); // Array of All Options
?>
	<div class="waifu">
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
    </div>
	<script type="text/javascript">
			var jsonStr = '<?php echo json_encode($live_2d__options); ?>';
        initModel("<?php echo LIVE2D_ASSETS ?>waifu-tips.json",JSON.parse(jsonStr));
    </script>
<?php
		
}
add_action( 'wp_footer', 'live2D_DefMod' );

?>