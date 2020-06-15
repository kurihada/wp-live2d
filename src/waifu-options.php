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
		
		add_settings_field(
			'test', // id
			'Test', // title
			array( $this, 'test_callback' ), // callback
			'live-2d-advanced', // page
			'live_2d_advanced_setting_section' // section
		);
	}
	
	public function test_callback(){
		printf(
			'<input class="regular-text" type="hidden" name="test" id="modelTexturesId" value="%s">',
			isset( $this->live_2d__options['test'] ) ? esc_attr( $this->live_2d__options['test']) : '53'
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
