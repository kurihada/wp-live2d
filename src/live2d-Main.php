<?php
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

require(dirname(__FILE__)  . '/waifu-Advanced.php');
require(dirname(__FILE__)  . '/waifu-Settings.php');
require(dirname(__FILE__)  . '/waifu-Settings-Style.php');
require(dirname(__FILE__)  . '/waifu-Settings-Tips.php');
require(dirname(__FILE__)  . '/waifu-Settings-Toolbar.php');
require(dirname(__FILE__)  . '/waifu-Settings-Base.php');
class live2D {
	
	

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'live_2d__add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'live_2d_waifu_page_init' ) );
		// 保存设置JSON的钩子 在执行update_option_live_2d_advanced_option_name时进行
		add_action('updated_option', function( $option_name, $old_value, $value ) {
			$this->live2D_Advanced_Save($option_name, $old_value, $value );
		}, 10, 3);
	}

	public function live2D_Advanced_Save($option_name, $old_value, $value ){
		if($option_name == 'live_2d_advanced_option_name'){
			$waifu_tips = new live2D_Utils();
			$waifu_Josn = $waifu_tips -> advanced_json($value);
			$waifu_tips -> update_Waifu_JsonFile($waifu_Josn);
		}
	}
	public function live_2d__add_plugin_page() {
		$menu = __('Live 2D 设置','live-2d');
		$my_admin_page = add_options_page(
			$menu, // page_title
			$menu, // menu_title
			'manage_options', // capability
			'live-2d-options', // menu_slug
			array( $this, 'live_2d__create_admin_page' ) // function
		);
		add_action('load-'.$my_admin_page, array('live2D_Utils','live_2D_help_tab'));
	}

	

	public function live_2d__create_admin_page() {
?>

		<div class="wrap">
			<h2 class="nav-tab-wrapper">
				<a id="settings_btn" href="#settings" class="nav-tab"><?php esc_html_e('基础设置','live-2d') ?></a>
				<a id="toolbar_btn" href="#toolbar" class="nav-tab"><?php esc_html_e('工具栏设置','live-2d') ?></a>
				<a id="tips_btn" href="#tips" class="nav-tab"><?php esc_html_e('提示消息选项','live-2d') ?></a>
				<a id="style_btn" href="#style" class="nav-tab"><?php esc_html_e('看板娘样式设置','live-2d') ?></a>
				<a id="advanced_btn" href="#advanced" class="nav-tab"><?php esc_html_e('高级设置','live-2d') ?></a>
			</h2>
			<?php get_settings_errors('live_2d_advanced_option_saveFiles'); ?>
			<form method="post" action="options.php">
			<?php settings_fields( 'live_2d_settings_base_group' ); ?>
				<div id="settings" class="group">
					<?php
						do_settings_sections( 'live-2d-settings-base' );
						submit_button();
					?>
				</div>
				<div id="toolbar" class="group">
					<?php
						do_settings_sections( 'live-2d-settings-toolbar' );
						submit_button();
					?>
				</div>
				<div id="tips" class="group">
					<?php
						do_settings_sections( 'live-2d-settings-tips' );
						submit_button();
					?>
				</div>
				<div id="style" class="group">
					<?php
						do_settings_sections( 'live-2d-settings-style' );
						submit_button();
					?>
				</div>
			</form>
			<div id="advanced" class="group">
				<form method="post" action="options.php">
				<?php
					settings_fields( 'live_2d_advanced_option_group' );
					do_settings_sections( 'live-2d-advanced-admin' );
					submit_button('','primary','submit_advanced');
				?>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				// 默认值
				$('.group').hide();
				$('.nav-tab-wrapper a').removeClass('nav-tab-active');
				//表单默认值
				var activetab = '';
                if (typeof(localStorage) !== 'undefined') {
                    activetab = localStorage.getItem("activetab");
                }
                if (activetab !== '' && $(activetab).length) {
                    $(activetab).fadeIn();
                } else {
                    $('.group:first').fadeIn();
                }
				// 选项卡默认值
				if (activetab !== '' && $(activetab + '_btn').length) {
                    $(activetab + '_btn').addClass('nav-tab-active');
                }
                else {
                    $('#settings_btn').addClass('nav-tab-active');
                }
				
				// 切换按钮事件
				$('.nav-tab-wrapper a').click(function(evt){
					$('.nav-tab-wrapper a').removeClass('nav-tab-active');
					$(this).addClass('nav-tab-active');
					var clicked_group = $(this).attr('href');
					
					$('.group').hide();
                    $(clicked_group).fadeIn();
                    evt.preventDefault();
					
					if (typeof(localStorage) !== 'undefined') {
                        localStorage.setItem("activetab", clicked_group);
                    }
				});
				
				//----------------“添加/删除”按钮事件--------------

				$('input.addbtn').click(function(){
					var optName = jQuery(this).attr('optname');
					var keyName = jQuery(this).attr('keyname');
					var arrType = jQuery(this).attr('arrtype');
					addMsgInput(optName,keyName,this,arrType);
				});
				

				$('input.delbtn').click(function(){
					var optName = jQuery(this).attr('optname');
					var keyName = jQuery(this).attr('keyname');
					var arrType = jQuery(this).attr('arrtype');
					delMsgInput(optName,keyName,this,arrType);
				});

				$('input[type=range]').bind('input propertychange', function() {  
					jQuery(this).next('.result').html(jQuery(this).val());
				});
			});
			
			function addMsgInput(optName,clsName,obj,typeName){
				var txtList = jQuery('p.'+ clsName);
				var indexNum = txtList.length
				var txtClone = txtList.last().clone();
				switch (typeName){
					case 'Selector':
						txtClone.children('input.selector').attr('name', optName + '['+clsName+']['+indexNum+'][selector]')
							.attr('id',clsName+'_'+indexNum+'_selector').val('');
						txtClone.children('input.text').attr('name', optName + '['+clsName+']['+indexNum+'][text]')
							.attr('id',clsName+'_'+indexNum+'_text').val('');
					break;
					case 'Array':
						txtClone.children('input:eq(0)').attr('name', optName + '['+clsName+']['+indexNum+'][0]')
							.attr('id',clsName+'_'+indexNum+'_0').val('');
						txtClone.children('input:eq(1)').attr('name', optName + '['+clsName+']['+indexNum+'][1]')
							.attr('id',clsName+'_'+indexNum+'_1').val('');
					break;
					case 'List':
						txtClone.children('input.textArray').attr('name', optName + '['+clsName+']['+indexNum+']')
							.attr('id',clsName+'_'+indexNum).val('');
					break;
				}
				//删除按钮
				txtClone.children('input.delbtn').attr('name',clsName+'_delbtn'+indexNum)
						.attr('id',clsName+'_delbtn'+indexNum)
						.bind('click',function(){
							delMsgInput(optName,clsName,this,typeName);
						});
				txtList.last().after(txtClone);
			}
			
			// 删除一个动态选项isSelector是如果是有选择器的动态选项，有选择器则传true
			// isArray是没有选择器的动态选项，例如日期选择（暂时不用）
			// 如果都不传递则为，支持多句随机类型的添加器。
			function delMsgInput(optName,clsName,obj,typeName){
				//如果没有其他组件就不能删除了
				var otherTxt = jQuery(obj).parent().siblings('.' + clsName);
				if(otherTxt.length==0) return;
				// 在删除前隐藏并重组组件
				jQuery(obj).parent().fadeOut("fast",function(){
					var allTxt = jQuery(this).siblings('.' + clsName);
					allTxt.each(function(i,e){
						switch (typeName){
							case 'Selector':
								jQuery(e).children('.selector').attr('name', optName + '['+clsName+']['+i+'][selector]')
									.attr('id',clsName+'_'+i+'_selector');
								jQuery(e).children('.text').attr('name', optName + '['+clsName+']['+i+'][text]')
									.attr('id',clsName+'_'+i+'_text');
							break;
							case 'Array':
								jQuery(e).children('input:eq(0)').attr('name', optName + '['+clsName+']['+i+'][0]')
									.attr('id',clsName+'_'+i+'_0');
								jQuery(e).children('input:eq(1)').attr('name', optName + '['+clsName+']['+i+'][1]')
									.attr('id',clsName+'_'+i+'_1');
							break;
							case 'List':
								jQuery(e).children('input.textArray').attr('name', optName + '['+clsName+']['+i+']')
									.attr('id',clsName+'_'+i);
							break;
						}
						jQuery(e).children('input.delbtn').attr('id',clsName+'_delbtn'+i)
							.attr('name',clsName+'_delbtn'+i);
					});
					// 执行删除
					this.remove();
				});
			}
		</script>
	<?php }
	
	public function live_2d_waifu_page_init(){
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha',plugin_dir_url( __FILE__ ) . '../assets/wp-color-picker-alpha.min.js',array( 'wp-color-picker' ) );
		// 注册基础设置
        register_setting(
            'live_2d_settings_base_group', // option_group
            'live_2d_settings_option_name', // option_name
            array( 'live2D_Settings', 'live_2d_settings_sanitize' ) // sanitize_callback
        );

		//加载基础设置
		$waifu_set = new live2D_Settings_Base();
		$waifu_set->live_2d_settings_base_init();

		//加载样式设置
		$waifu_style = new live2D_Settings_Style();
		$waifu_style->live_2d_settings_style_init();

		//加载提示设置
		$waifu_tips = new live2D_Settings_Tips();
		$waifu_tips->live_2d_settings_tips_init();

		//加载工具栏设置
		$waifu_toolbar = new live2D_Settings_Toolbar();
		$waifu_toolbar->live_2d_settings_toolbar_init();
		
		// 加载高级设置
		$waifu_opt = new live2D_Advanced();
		$waifu_opt->live_2d_advanced_init();
	}

}
?>
