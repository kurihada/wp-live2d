<?php
class live_Waifu {
	public function live_2d_advanced_init(){
		// 注册高级设置
		register_setting(
			'live_2d_advanced_option_group', // option_group
			'live_2d_advanced_option_name', // option_name
			array( $this, 'live_2d__sanitize' ) // sanitize_callback
		);
		
		add_settings_section(
			'live_2d_advanced_setting_section', // id
			'高级设置（如果切换基础设置请先保存此页面的改动）', // title
			array( $this, 'live_2d_advanced_section_info' ), // callback
			'live-2d-advanced' // page
		);
		
	}
	
	public function live_2d_advanced_section_info() {
	}

	public static function advanced_json() {
		$msg = array();
		$msg["console_open_msg"] = array("哈哈，你打开了控制台，是想要看看我的秘密吗？");
		$result = array();
	
		$result["waifu"] = $msg;
		
		$result["mouseover"] = "";
		
		$result["click"] = "";
		
		$result["seasons"] = "";
		
		return $result;
	}
	
	
}
?>
