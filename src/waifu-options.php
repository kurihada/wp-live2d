<?php
class live_Waifu {
	
	private $live_2d_advanced_options;
	
	public function live_2d_advanced_init() {
		
		$this->live_2d_advanced_options = get_option( 'live_2d_advanced_option_name' );
		
		register_setting(
			'live_2d_advanced_option_group', // option_group
			'live_2d_advanced_option_name', // option_name
			array( $this, 'live_2d_advanced_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'live_2d_advanced_setting_section', // id
			'高级设置（如果切换基础设置请先保存此页面的改动）', // title
			array( $this, 'live_2d_advanced_section_info' ), // callback
			'live-2d-advanced-admin' // page
		);

		add_settings_field(
			'console_open_msg', // id
			'打开控制台提示', // title
			array( $this, 'console_open_msg_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'copy_message', // id
			'复制信息时的提示', // title
			array( $this, 'copy_message_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'screenshot_message', // id
			'截图时的提示', // title
			array( $this, 'screenshot_message_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'hidden_message', // id
			'隐藏看板娘的提示', // title
			array( $this, 'hidden_message_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'load_rand_textures', // id
			'更换服装时的提示', // title
			array( $this, 'load_rand_textures_callback'), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);
		
		add_settings_field(
			'hour_tips', // id
			'每小时提示', // title
			array( $this, 'hour_tips_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);
		// 每小时提示的隐藏表单域
		add_settings_field(
			'hour_tips_hidden', // id
			null, // title
			array( $this, 'hour_tips_hidden_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'localhost_6', // id
			'localhost', // title
			array( $this, 'localhost_6_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'baidu_7', // id
			'baidu', // title
			array( $this, 'baidu_7_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'so_8', // id
			'so', // title
			array( $this, 'so_8_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'google_9', // id
			'google', // title
			array( $this, 'google_9_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'default_10', // id
			'default', // title
			array( $this, 'default_10_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'none_11', // id
			'none', // title
			array( $this, 'none_11_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'referrer_hostname_12', // id
			'referrer_hostname', // title
			array( $this, 'referrer_hostname_12_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'model_message_13', // id
			'model_message', // title
			array( $this, 'model_message_13_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'hitokoto_api_lwl12_14', // id
			'hitokoto_api_lwl12', // title
			array( $this, 'hitokoto_api_lwl12_14_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'hitokoto_api_fghrsh_15', // id
			'hitokoto_api_fghrsh', // title
			array( $this, 'hitokoto_api_fghrsh_15_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'hitokoto_api_jinrishici_16', // id
			'hitokoto_api_jinrishici', // title
			array( $this, 'hitokoto_api_jinrishici_16_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'hitokoto_api_hitokoto_17', // id
			'hitokoto_api_hitokoto', // title
			array( $this, 'hitokoto_api_hitokoto_17_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'mouseover_18', // id
			'mouseover', // title
			array( $this, 'mouseover_18_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'click_19', // id
			'click', // title
			array( $this, 'click_19_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'seasons_20', // id
			'seasons', // title
			array( $this, 'seasons_20_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);
		
		
		
	}

	public function live_2d_advanced_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['console_open_msg'] ) ) {
			$sanitary_values['console_open_msg'] = sanitize_text_field( $input['console_open_msg'] );
		}

		if ( isset( $input['copy_message'] ) ) {
			$sanitary_values['copy_message'] = sanitize_text_field( $input['copy_message'] );
		}

		if ( isset( $input['screenshot_message'] ) ) {
			$sanitary_values['screenshot_message'] = sanitize_text_field( $input['screenshot_message'] );
		}

		if ( isset( $input['hidden_message'] ) ) {
			$sanitary_values['hidden_message'] = sanitize_text_field( $input['hidden_message'] );
		}

		if ( isset( $input['load_rand_textures'] ) ) {
			$sanitary_values['load_rand_textures'] = $input['load_rand_textures'];
		}

		if ( isset( $input['hour_tips'] ) ) {
			$sanitary_values['hour_tips'] = $input['hour_tips'];
		}

		if ( isset( $input['hour_tips_hidden'] ) ) {
			$sanitary_values['hour_tips_hidden'] = $input['hour_tips_hidden'];
		}
		
		if ( isset( $input['localhost_6'] ) ) {
			$sanitary_values['localhost_6'] = sanitize_text_field( $input['localhost_6'] );
		}

		if ( isset( $input['baidu_7'] ) ) {
			$sanitary_values['baidu_7'] = sanitize_text_field( $input['baidu_7'] );
		}

		if ( isset( $input['so_8'] ) ) {
			$sanitary_values['so_8'] = sanitize_text_field( $input['so_8'] );
		}

		if ( isset( $input['google_9'] ) ) {
			$sanitary_values['google_9'] = sanitize_text_field( $input['google_9'] );
		}

		if ( isset( $input['default_10'] ) ) {
			$sanitary_values['default_10'] = sanitize_text_field( $input['default_10'] );
		}

		if ( isset( $input['none_11'] ) ) {
			$sanitary_values['none_11'] = sanitize_text_field( $input['none_11'] );
		}

		if ( isset( $input['referrer_hostname_12'] ) ) {
			$sanitary_values['referrer_hostname_12'] = sanitize_text_field( $input['referrer_hostname_12'] );
		}

		if ( isset( $input['model_message_13'] ) ) {
			$sanitary_values['model_message_13'] = sanitize_text_field( $input['model_message_13'] );
		}

		if ( isset( $input['hitokoto_api_lwl12_14'] ) ) {
			$sanitary_values['hitokoto_api_lwl12_14'] = sanitize_text_field( $input['hitokoto_api_lwl12_14'] );
		}

		if ( isset( $input['hitokoto_api_fghrsh_15'] ) ) {
			$sanitary_values['hitokoto_api_fghrsh_15'] = sanitize_text_field( $input['hitokoto_api_fghrsh_15'] );
		}

		if ( isset( $input['hitokoto_api_jinrishici_16'] ) ) {
			$sanitary_values['hitokoto_api_jinrishici_16'] = sanitize_text_field( $input['hitokoto_api_jinrishici_16'] );
		}

		if ( isset( $input['hitokoto_api_hitokoto_17'] ) ) {
			$sanitary_values['hitokoto_api_hitokoto_17'] = sanitize_text_field( $input['hitokoto_api_hitokoto_17'] );
		}

		if ( isset( $input['mouseover_18'] ) ) {
			$sanitary_values['mouseover_18'] = sanitize_text_field( $input['mouseover_18'] );
		}

		if ( isset( $input['click_19'] ) ) {
			$sanitary_values['click_19'] = sanitize_text_field( $input['click_19'] );
		}

		if ( isset( $input['seasons_20'] ) ) {
			$sanitary_values['seasons_20'] = sanitize_text_field( $input['seasons_20'] );
		}

		return $sanitary_values;
	}

	public function console_open_msg_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[console_open_msg]" id="console_open_msg" value="%s">',
			isset( $this->live_2d_advanced_options['console_open_msg'] ) ? esc_attr( $this->live_2d_advanced_options['console_open_msg']) : ''
		);
	}

	public function copy_message_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[copy_message]" id="copy_message" value="%s">',
			isset( $this->live_2d_advanced_options['copy_message'] ) ? esc_attr( $this->live_2d_advanced_options['copy_message']) : ''
		);
	}

	public function screenshot_message_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[screenshot_message]" id="screenshot_message" value="%s">',
			isset( $this->live_2d_advanced_options['screenshot_message'] ) ? esc_attr( $this->live_2d_advanced_options['screenshot_message']) : ''
		);
	}

	public function hidden_message_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[hidden_message]" id="hidden_message" value="%s">',
			isset( $this->live_2d_advanced_options['hidden_message'] ) ? esc_attr( $this->live_2d_advanced_options['hidden_message']) : ''
		);
	}

	public function load_rand_textures_callback() {
		printf(
			'<input class="regular-text" style="width: 280px"  type="text" name="live_2d_advanced_option_name[load_rand_textures][0]" id="load_rand_textures_0" value="%s" placeholder = "没有服装时的提示">
			 <input class="regular-text" style="width: 280px" type="text" name="live_2d_advanced_option_name[load_rand_textures][1]" id="load_rand_textures_1" value="%s" placeholder = "切换时的提示"><br />
			 <p>请在第一个输入框输入没有服装时的默认提示，第二个输入框输入每次切换时的提示消息</p>
			',
			isset( $this->live_2d_advanced_options['load_rand_textures'][0] ) ? esc_attr( $this->live_2d_advanced_options['load_rand_textures'][0]) : '',
			isset( $this->live_2d_advanced_options['load_rand_textures'][1] ) ? esc_attr( $this->live_2d_advanced_options['load_rand_textures'][1]) : ''
		);
	}
	
	public function hour_tips_callback() {
		printf(
			'<input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][0][0]" id="hour_tips_1" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][0][1]" id="hour_tips_2" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][1][0]" id="hour_tips_3" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][1][1]" id="hour_tips_4" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][2][0]" id="hour_tips_5" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][2][1]" id="hour_tips_6" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][3][0]" id="hour_tips_7" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][3][1]" id="hour_tips_8" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][4][0]" id="hour_tips_9" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][4][1]" id="hour_tips_10" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][5][0]" id="hour_tips_11" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][5][1]" id="hour_tips_12" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][6][0]" id="hour_tips_13" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][6][1]" id="hour_tips_14" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][7][0]" id="hour_tips_15" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][7][1]" id="hour_tips_16" value="%s"><br />
			 <input class="regular-text" style="width: 100px" type="text" name="live_2d_advanced_option_name[hour_tips][8][0]" id="hour_tips_17" value="%s"> 时 
			 <input class="regular-text" type="text" name="live_2d_advanced_option_name[hour_tips][8][1]" id="hour_tips_18" value="%s"><br />',
			isset( $this->live_2d_advanced_options['hour_tips'][0][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][0][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][0][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][0][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][1][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][1][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][1][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][1][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][2][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][2][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][2][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][2][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][3][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][3][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][3][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][3][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][4][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][4][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][4][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][4][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][5][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][5][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][5][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][5][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][6][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][6][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][6][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][6][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][7][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][7][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][7][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][7][1]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][8][0] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][8][0]) : '',
			isset( $this->live_2d_advanced_options['hour_tips'][8][1] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips'][8][1]) : ''
		);
	}
	
	public function hour_tips_hidden_callback(){
		printf(
			'
			时间按照t{开始小时}-{结束小时}的方式填写，例如：t5-7或t7-11
			<input type="hidden" name="live_2d_advanced_option_name[hour_tips_hidden]" id="hour_tips_hidden" value="%s">',
			isset( $this->live_2d_advanced_options['hour_tips_hidden'] ) ? esc_attr( $this->live_2d_advanced_options['hour_tips_hidden']) : ''
		);
	}

	public function localhost_6_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[localhost_6]" id="localhost_6" value="%s">',
			isset( $this->live_2d_advanced_options['localhost_6'] ) ? esc_attr( $this->live_2d_advanced_options['localhost_6']) : ''
		);
	}

	public function baidu_7_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[baidu_7]" id="baidu_7" value="%s">',
			isset( $this->live_2d_advanced_options['baidu_7'] ) ? esc_attr( $this->live_2d_advanced_options['baidu_7']) : ''
		);
	}

	public function so_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[so_8]" id="so_8" value="%s">',
			isset( $this->live_2d_advanced_options['so_8'] ) ? esc_attr( $this->live_2d_advanced_options['so_8']) : ''
		);
	}

	public function google_9_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[google_9]" id="google_9" value="%s">',
			isset( $this->live_2d_advanced_options['google_9'] ) ? esc_attr( $this->live_2d_advanced_options['google_9']) : ''
		);
	}

	public function default_10_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[default_10]" id="default_10" value="%s">',
			isset( $this->live_2d_advanced_options['default_10'] ) ? esc_attr( $this->live_2d_advanced_options['default_10']) : ''
		);
	}

	public function none_11_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[none_11]" id="none_11" value="%s">',
			isset( $this->live_2d_advanced_options['none_11'] ) ? esc_attr( $this->live_2d_advanced_options['none_11']) : ''
		);
	}

	public function referrer_hostname_12_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[referrer_hostname_12]" id="referrer_hostname_12" value="%s">',
			isset( $this->live_2d_advanced_options['referrer_hostname_12'] ) ? esc_attr( $this->live_2d_advanced_options['referrer_hostname_12']) : ''
		);
	}

	public function model_message_13_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[model_message_13]" id="model_message_13" value="%s">',
			isset( $this->live_2d_advanced_options['model_message_13'] ) ? esc_attr( $this->live_2d_advanced_options['model_message_13']) : ''
		);
	}

	public function hitokoto_api_lwl12_14_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[hitokoto_api_lwl12_14]" id="hitokoto_api_lwl12_14" value="%s">',
			isset( $this->live_2d_advanced_options['hitokoto_api_lwl12_14'] ) ? esc_attr( $this->live_2d_advanced_options['hitokoto_api_lwl12_14']) : ''
		);
	}

	public function hitokoto_api_fghrsh_15_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[hitokoto_api_fghrsh_15]" id="hitokoto_api_fghrsh_15" value="%s">',
			isset( $this->live_2d_advanced_options['hitokoto_api_fghrsh_15'] ) ? esc_attr( $this->live_2d_advanced_options['hitokoto_api_fghrsh_15']) : ''
		);
	}

	public function hitokoto_api_jinrishici_16_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[hitokoto_api_jinrishici_16]" id="hitokoto_api_jinrishici_16" value="%s">',
			isset( $this->live_2d_advanced_options['hitokoto_api_jinrishici_16'] ) ? esc_attr( $this->live_2d_advanced_options['hitokoto_api_jinrishici_16']) : ''
		);
	}

	public function hitokoto_api_hitokoto_17_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[hitokoto_api_hitokoto_17]" id="hitokoto_api_hitokoto_17" value="%s">',
			isset( $this->live_2d_advanced_options['hitokoto_api_hitokoto_17'] ) ? esc_attr( $this->live_2d_advanced_options['hitokoto_api_hitokoto_17']) : ''
		);
	}

	public function mouseover_18_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[mouseover_18]" id="mouseover_18" value="%s">',
			isset( $this->live_2d_advanced_options['mouseover_18'] ) ? esc_attr( $this->live_2d_advanced_options['mouseover_18']) : ''
		);
	}

	public function click_19_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[click_19]" id="click_19" value="%s">',
			isset( $this->live_2d_advanced_options['click_19'] ) ? esc_attr( $this->live_2d_advanced_options['click_19']) : ''
		);
	}

	public function seasons_20_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[seasons_20]" id="seasons_20" value="%s">',
			isset( $this->live_2d_advanced_options['seasons_20'] ) ? esc_attr( $this->live_2d_advanced_options['seasons_20']) : ''
		);
	}
	
	public function live_2d_advanced_section_info() {
		// 更新配置文件
		if (isset($_GET['settings-updated'])){
			$set_updated = $_GET['settings-updated'];
			if($set_updated){
				file_put_contents(plugin_dir_path(__FILE__)  . '..\\assets\\waifu-tips.json',json_encode(live_Waifu::advanced_json()));
			}
		}
	}

	public static function advanced_json() {
		$result = array();
	
		$result["waifu"] = self::waifuMsg_Json();
		
		$result["mouseover"] = self::mouseOverMsg_Json();
		
		$result["click"] = self::clickMsg_Json();
		
		$result["seasons"] = self::seasonsMsg_Json();
		
		return $result;
	}
	
	// waifu节点组装，此节点主要是提示消息
	public static function waifuMsg_Json(){
		$msg = array();
		$msg["console_open_msg"] = array("哈哈，你打开了控制台，是想要看看我的秘密吗？");
		$msg["copy_message"] = array("你都复制了些什么呀，转载要记得加上出处哦");
		$msg["screenshot_message"] = array("照好了嘛，是不是很可爱呢？");
		$msg["hidden_message"] = array("我们还能再见面的吧…");
		$msg["load_rand_textures"] = array("我还没有其他衣服呢", "我的新衣服好看嘛");
		$msg["hour_tips"] = self::hourTips_Json();
		$msg["referrer_message"] = self::referrerMsg_Json();
		$msg["referrer_hostname"] = self::referrerHost_Json();
		$msg["model_message"] = self::modelMsg_Json();
		$msg["hitokoto_api_message"] = self::hitokotoApi_Json();
		return $msg;
	}
	
	// 时间段提示语
	public static function hourTips_Json(){
		$hourTips = array();
		
		$hourTips["t5-7"]=array("早上好！一日之计在于晨，美好的一天就要开始了");
		$hourTips["t7-11"]=array("上午好！工作顺利嘛，不要久坐，多起来走动走动哦！");
		$hourTips["t11-14"]=array("中午了，工作了一个上午，现在是午餐时间！");
		$hourTips["t14-17"]=array("午后很容易犯困呢，今天的运动目标完成了吗？");
		$hourTips["t17-19"]=array("傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红~");
		$hourTips["t19-21"]=array("晚上好，今天过得怎么样？");
		$hourTips["t21-23"]=array("已经这么晚了呀，早点休息吧，晚安~");
		$hourTips["t23-5"]=array("你是夜猫子呀？这么晚还不睡觉，明天起的来嘛");
		$hourTips["default"]=array("嗨~ 快来逗我玩吧！");
		
		return $hourTips;
	}
	
	// 来自搜索引擎的问候
	public static function referrerMsg_Json(){
		$referrerMsg = array();
		$referrerMsg["localhost"] = array("欢迎阅读<span style=\"color:#0099cc;\">『", "』</span>", " - ");
		$referrerMsg["baidu"] = array("Hello! 来自 百度搜索 的朋友<br>你是搜索 <span style=\"color:#0099cc;\">", "</span> 找到的我吗？");
		$referrerMsg["so"] = array("Hello! 来自 360搜索 的朋友<br>你是搜索 <span style=\"color:#0099cc;\">", "</span> 找到的我吗？");
		$referrerMsg["google"] = array("Hello! 来自 谷歌搜索 的朋友<br>欢迎阅读<span style=\"color:#0099cc;\">『", "』</span>", " - ");
		$referrerMsg["default"] = array("Hello! 来自 <span style=\"color:#0099cc;\">", "</span> 的朋友");
		$referrerMsg["none"] = array("欢迎阅读<span style=\"color:#0099cc;\">『", "』</span>", " - ");
		
		return $referrerMsg;
	}
	
	// 确定自己网站的域名
	public static function referrerHost_Json(){
		$referrerHost = array();
		$referrerHost["example.com"] = array("示例网站");
		$referrerHost["www.fghrsh.net"] = array("FGHRSH 的博客");
		return $referrerHost;
	}
	
	// 模型切换的消息（可能已经用不上了）
	public static function modelMsg_Json(){
		$modelMsg = array();
		$modelMsg["1"] = array("来自 Potion Maker 的 Pio 酱 ~");
		$modelMsg["2"] = array("来自 Potion Maker 的 Tia 酱 ~");
		return $modelMsg;
	}
	
	// 一言API返回的结果
	public static function hitokotoApi_Json(){
		$hitokotoMsg = array();
		$hitokotoMsg["lwl12.com"] = array("这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>", "，是 <span style=\"color:#0099cc;\">{creator}</span> 投稿的", "。");
		$hitokotoMsg["fghrsh.net"] = array("这句一言出处是 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">FGHRSH</span> 在 {date} 收藏的！");
		$hitokotoMsg["jinrishici.com"] = array("这句诗词出自 <span style=\"color:#0099cc;\">《{title}》</span>，是 {dynasty}诗人 {author} 创作的！");
		$hitokotoMsg["hitokoto.cn"] = array("这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">{creator}</span> 在 hitokoto.cn 投稿的。");
		return $hitokotoMsg;
	}
	
	// 鼠标浮动事件（可自定义）
	public static function mouseOverMsg_Json(){
		$mouseOverMsg = array();
		$mouseOverMsg[0]["selector"]= ".fui-home";
		$mouseOverMsg[0]["text"]= array("点击前往首页，想回到上一页可以使用浏览器的后退功能哦");
		$mouseOverMsg[1]["selector"]= ".fui-chat";
		$mouseOverMsg[1]["text"]= array("一言一语，一颦一笑。一字一句，一颗赛艇。");
		$mouseOverMsg[2]["selector"]= ".fui-eye";
		$mouseOverMsg[2]["text"]= array("嗯··· 要切换 看板娘 吗？");
		$mouseOverMsg[3]["selector"]= ".fui-user";
		$mouseOverMsg[3]["text"]= array("喜欢换装 Play 吗？");
		$mouseOverMsg[4]["selector"]= ".fui-photo";
		$mouseOverMsg[4]["text"]= array("要拍张纪念照片吗？");
		$mouseOverMsg[5]["selector"]= ".fui-info-circle";
		$mouseOverMsg[5]["text"]= array("这里有关于我的信息呢");
		$mouseOverMsg[6]["selector"]= ".fui-cross";
		$mouseOverMsg[6]["text"]= array("你不喜欢我了吗...");
		
		//这里要有一个循环来自定义指定的鼠标浮动事件
		
		return $mouseOverMsg;
	}
	// 鼠标点击事件（可自定义）
	public static function clickMsg_Json(){
		$clickMsg = array();
		$clickMsg[0]["selector"]=".waifu #live2d";
		$clickMsg[0]["text"]=array(
									"是…是不小心碰到了吧",
									"萝莉控是什么呀",
									"你看到我的小熊了吗",
									"再摸的话我可要报警了！⌇●﹏●⌇",
									"110吗，这里有个变态一直在摸我(ó﹏ò｡)"
									);
		//这里要有一个循环来自定义指定的鼠标点击事件
		return $clickMsg;
	}
	
	// 节日事件（可自定义）
	public static function seasonsMsg_Json(){
		$seasonsMsg = array();
		$seasonsMsg[0]["date"]= "01/01";
		$seasonsMsg[0]["text"]= array("<span style=\"color:#0099cc;\">元旦</span>了呢，新的一年又开始了，今年是{year}年~");
		//这里要有一个循环来自定义指定节日事件
		return $seasonsMsg;
	}
}
?>
