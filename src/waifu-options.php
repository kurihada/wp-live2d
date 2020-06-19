<?php
class live_Waifu {
	
	private $live_2d_advanced_options;
	
	private $hour_tips_readonly = true;
	
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

		add_settings_field(
			'referrer_message', // id
			'搜索引擎入站提示', // title
			array( $this, 'referrer_message_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);


		add_settings_field(
			'referrer_hostname', // id
			'访问本站点的提示', // title
			array( $this, 'referrer_hostname_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'model_message', // id
			'切换模型提示', // title
			array( $this, 'model_message_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'hitokoto_api_message', // id
			'一言API的消息', // title
			array( $this, 'hitokoto_api_message_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);


		add_settings_field(
			'mouseover_msg', // id
			'鼠标悬停时的消息提示', // title
			array( $this, 'mouseover_msg_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);
		
		add_settings_field(
			'click_selector', // id
			'鼠标点击选择器', // title
			array( $this, 'click_selector_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'click_msg', // id
			'鼠标点击时的消息提示', // title
			array( $this, 'click_msg_callback' ), // callback
			'live-2d-advanced-admin', // page
			'live_2d_advanced_setting_section' // section
		);

		add_settings_field(
			'seasons_msg', // id
			'节日事件', // title
			array( $this, 'seasons_msg_callback' ), // callback
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
		
		if ( isset( $input['referrer_message'] ) ) {
			$sanitary_values['referrer_message'] = $input['referrer_message'];
		}

		if ( isset( $input['referrer_hostname'] ) ) {
			$sanitary_values['referrer_hostname'] =  $input['referrer_hostname'] ;
		}

		if ( isset( $input['model_message'] ) ) {
			$sanitary_values['model_message'] = $input['model_message'] ;
		}

		if ( isset( $input['hitokoto_api_message'] ) ) {
			$sanitary_values['hitokoto_api_message'] = $input['hitokoto_api_message'];
		}

		if ( isset( $input['mouseover_msg'] ) ) {
			$sanitary_values['mouseover_msg'] = $input['mouseover_msg'];
		}
		
		if ( isset( $input['click_selector'] ) ) {
			$sanitary_values['click_selector'] = sanitize_text_field($input['click_selector']);
		}
		
		if ( isset( $input['click_msg'] ) ) {
			$sanitary_values['click_msg'] = $input['click_msg'];
		}

		if ( isset( $input['seasons_msg'] ) ) {
			$sanitary_values['seasons_msg'] = $input['seasons_msg'];
		}

		return $sanitary_values;
	}
	//控制台被打开提醒（支持多句随机）
	public function console_open_msg_callback() {
		$defKey = array();
		$defKey['console_open_msg'][0] = '哈哈，你打开了控制台，是想要看看我的秘密吗？';
		$this->loopMsg('console_open_msg','List',$defKey);
	}
	//内容被复制触发提醒（支持多句随机）
	public function copy_message_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[copy_message]" id="copy_message" value="%s">',
			isset( $this->live_2d_advanced_options['copy_message'] ) ? esc_attr( $this->live_2d_advanced_options['copy_message']) : ''
		);
	}
	//看板娘截图提示语（支持多句随机）
	public function screenshot_message_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[screenshot_message]" id="screenshot_message" value="%s">',
			isset( $this->live_2d_advanced_options['screenshot_message'] ) ? esc_attr( $this->live_2d_advanced_options['screenshot_message']) : ''
		);
	}
	//看板娘隐藏提示语（支持多句随机）
	public function hidden_message_callback() {
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[hidden_message]" id="hidden_message" value="%s">',
			isset( $this->live_2d_advanced_options['hidden_message'] ) ? esc_attr( $this->live_2d_advanced_options['hidden_message']) : ''
		);
	}
	//随机材质提示语（暂不支持多句）
	public function load_rand_textures_callback() {
		printf(
			'<input class="regular-text" style="width: 280px"  type="text" name="live_2d_advanced_option_name[load_rand_textures][0]" id="load_rand_textures_0" value="%s" placeholder = "没有服装时的提示">
			 <input class="regular-text" style="width: 280px" type="text" name="live_2d_advanced_option_name[load_rand_textures][1]" id="load_rand_textures_1" value="%s" placeholder = "切换时的提示"><br />
			 <p>请在第一个输入框输入没有服装时的默认提示，第二个输入框输入每次切换时的提示消息</p>
			',
			isset( $this->live_2d_advanced_options['load_rand_textures'][0] ) ? esc_attr( $this->live_2d_advanced_options['load_rand_textures'][0]) : '我还没有其他衣服呢',
			isset( $this->live_2d_advanced_options['load_rand_textures'][1] ) ? esc_attr( $this->live_2d_advanced_options['load_rand_textures'][1]) : '我的新衣服好看嘛'
		);
	}
	//时间段欢迎语（支持多句随机）
	public function hour_tips_callback() {
		//这里指定时间就只有9个参数 因为waifu-tips.js中第266行之后的描述如此
		$tipsKey = array();
		$tipsKey['hour_tips'][0][0] = 't5-7';
		$tipsKey['hour_tips'][0][1] = '早上好！一日之计在于晨，美好的一天就要开始了';
		$tipsKey['hour_tips'][1][0] = 't7-11';
		$tipsKey['hour_tips'][1][1] = '上午好！工作顺利嘛，不要久坐，多起来走动走动哦！';
		$tipsKey['hour_tips'][2][0] = 't11-14';
		$tipsKey['hour_tips'][2][1] = '中午了，工作了一个上午，现在是午餐时间！';
		$tipsKey['hour_tips'][3][0] = 't14-17';
		$tipsKey['hour_tips'][3][1] = '午后很容易犯困呢，今天的运动目标完成了吗？';
		$tipsKey['hour_tips'][4][0] = 't17-19';
		$tipsKey['hour_tips'][4][1] = '傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红~';
		$tipsKey['hour_tips'][5][0] = 't19-21';
		$tipsKey['hour_tips'][5][1] = '晚上好，今天过得怎么样？';
		$tipsKey['hour_tips'][6][0] = 't21-23';
		$tipsKey['hour_tips'][6][1] = '已经这么晚了呀，早点休息吧，晚安~';
		$tipsKey['hour_tips'][7][0] = 't23-5';
		$tipsKey['hour_tips'][7][1] = '你是夜猫子呀？这么晚还不睡觉，明天起的来嘛';
		$tipsKey['hour_tips'][8][0] = 'default';
		$tipsKey['hour_tips'][8][1] = '嗨~ 快来逗我玩吧！';
		
		$this->loopMsg('hour_tips','Array',$tipsKey);
		echo '<p>时间按照t{开始小时}-{结束小时}的方式填写，例如：t5-7或t7-11（避免改错，目前此项无法更改）</p>';
	}


	// 请求来源欢迎语（不支持多句）
	public function referrer_message_callback() {
		$defKey = array();
		$defKey['referrer_message'][0][0] = 'localhost';
		$defKey['referrer_message'][0][1] = '欢迎阅读<span style=\"color:#0099cc;\">『{title}』</span>';
		$defKey['referrer_message'][1][0] = 'baidu';
		$defKey['referrer_message'][1][1] = 'Hello! 来自 百度搜索 的朋友<br>你是搜索 <span style=\"color:#0099cc;\">{keyword}</span> 找到的我吗？';
		$defKey['referrer_message'][2][0] = 'so';
		$defKey['referrer_message'][2][1] = 'Hello! 来自 360搜索 的朋友<br>你是搜索 <span style=\"color:#0099cc;\">{keyword}</span> 找到的我吗？';
		$defKey['referrer_message'][3][0] = 'google';
		$defKey['referrer_message'][3][1] = 'Hello! 来自 谷歌搜索 的朋友<br>欢迎阅读<span style=\"color:#0099cc;\">『{title}』</span>';
		$defKey['referrer_message'][4][0] = 'default';
		$defKey['referrer_message'][4][1] = 'Hello! 来自 <span style=\"color:#0099cc;\">{website}</span> 的朋友';
		$defKey['referrer_message'][5][0] = 'none';
		$defKey['referrer_message'][5][1] = '欢迎阅读<span style=\"color:#0099cc;\">『{title}』</span>';

		$this->loopMsg('referrer_message','Array',$defKey);
		echo '<p>请务必不要修改{}中的内容，{title}网站标题、{keyword}关键词、{website}站点名称</p>';
	}
	//请求来源自定义名称（根据 host，支持多句随机）
	public function referrer_hostname_callback() {
		$defKey = array();
		$defKey['referrer_hostname'][0][0] = 'example.com';
		$defKey['referrer_hostname'][0][1] = '示例网站';
		$defKey['referrer_hostname'][1][0] = 'www.fghrsh.net';
		$defKey['referrer_hostname'][1][1] = 'FGHRSH 的博客';

		$this->loopMsg('referrer_hostname','Array', $defKey , false);
		/*printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[referrer_hostname]" id="referrer_hostname" value="%s">',
			isset( $this->live_2d_advanced_options['referrer_hostname'] ) ? esc_attr( $this->live_2d_advanced_options['referrer_hostname']) : ''
		);*/
	}
	//模型切换欢迎语（根据模型 ID，支持多句随机）
	public function model_message_callback() {
		
		$this->loopMsg('model_message','List');
	}
	//一言 API 输出模板（不支持多句随机）
	public function hitokoto_api_message_callback() {
		$defKey = array();
		$defKey['hitokoto_api_message'][0][0] = 'lwl12.com';
		$defKey['hitokoto_api_message'][0][1] = '这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">{creator}</span> 投稿的。';
		$defKey['hitokoto_api_message'][1][0] = 'fghrsh.net';
		$defKey['hitokoto_api_message'][1][1] = '这句一言出处是 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">FGHRSH</span> 在 {date} 收藏的！';
		$defKey['hitokoto_api_message'][2][0] = 'jinrishici.com';
		$defKey['hitokoto_api_message'][2][1] = '这句诗词出自 <span style=\"color:#0099cc;\">《{title}》</span>，是 {dynasty}诗人 {author} 创作的！';
		$defKey['hitokoto_api_message'][3][0] = 'hitokoto.cn';
		$defKey['hitokoto_api_message'][3][1] = '这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">{creator}</span> 在 hitokoto.cn 投稿的。';
		$this->loopMsg('hitokoto_api_message','Array',$defKey);
		echo '<p>请务必不要修改{}中的内容</p>';//lwl12.com会有没有作者的情况
	}
	//鼠标触发提示（根据 CSS 选择器，支持多句随机）
	public function mouseover_msg_callback() {	
		$this->loopMsg('mouseover_msg','Selector');
		echo '<p>鼠标悬停位置的<a href="https://www.w3school.com.cn/jquery/jquery_ref_selectors.asp" target="_blank">jQuery选择器</a></p>';
	}
	
	public function click_selector_callback(){
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[click_selector]" id="click_selector" value="%s">',
			isset( $this->live_2d_advanced_options['click_selector'] ) ? esc_attr( $this->live_2d_advanced_options['click_selector']) : '.waifu #live2d'
		);
	}
	
	// 鼠标点击触发提示（根据 CSS 选择器，支持多句随机）
	public function click_msg_callback() {
		$this->loopMsg('click_msg','List');
		echo '<p>点击看板娘会循环以上的每一行点击事件</p>';
	}
	
	
	//节日提示（日期段，支持多句随机）
	public function seasons_msg_callback() {
		$this->loopMsg('seasons_msg','Selector');
		echo '<p>在指定的日期说提示语，日期的规则为MM/dd，例如2月14日为 02/14，可填写一个时间区间，格式为11/05-11/12。</p>';
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
	
	// $keyName options中的key值
	// $type 有3个选择：Selector（用于带有选择器的数组），Array（纯数组），List（只有文本的数组列表）
	// $defArray 是数组默认值，可在callback函数中确定默认值
	// $readonly 让第一组input 只读
	public function loopMsg($keyName,$type = 'List',$defArray = array(),$readonly = true ){
		$optionsArray = $this->live_2d_advanced_options;
		$txtCount = 1;// 以下判断不为true时 $txtCount =1
		// 如果options中存在则先获取options的长度
		if( isset($optionsArray[$keyName])){
			$txtCount = count($optionsArray[$keyName]);
		}else if(isset($defArray[$keyName])){
			// 如果options不存在而默认array中存在则获取默认array长度
			$txtCount = count($defArray[$keyName]);
		}
		// 为了防止$txtCount小于1做的强制判定
		$txtCount = $txtCount < 1 ? $txtCount = 1 : $txtCount;
		switch ($type){
			case 'Selector':
				for($x = 0;$x<$txtCount;$x++){
					printf(
						'<p class = "'.$keyName.'">
						<input class="regular-text selector" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.'][selector]" id="'.$keyName.'_'.$x.'_selector" value="%s" style="width: 200px">：
						<input class="regular-text text" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.'][text]" id="'.$keyName.'_'.$x.'_text" value="%s">
						<input class="button delbtn" keyname="'.$keyName.'" arrtype="'.$type.'" type="button" name="'.$keyName.'_delbtn'.$x.'" id="'.$keyName.'_delbtn'.$x.'" value="-"></p>',
						isset( $optionsArray[$keyName][$x]['selector'] ) ? esc_attr( $optionsArray[$keyName][$x]['selector']) : isset($defArray[$keyName][$x]['selector'])?esc_attr($defArray[$keyName][$x]['selector']):'',
						isset( $optionsArray[$keyName][$x]['text'] ) ? esc_attr( $optionsArray[$keyName][$x]['text']) : isset($defArray[$keyName][$x]['text'])?esc_attr($defArray[$keyName][$x]['text']):''
					);
				}
				echo '<p class="addBtn"><input class="button addbtn" keyname="'.$keyName.'" arrtype="'.$type.'" type="button" value="+ 点击此处增加一条" id="'.$keyName.'_addbtn" /></p>';
			break;
			case 'Array':
				if($readonly){
					//$txtCount = $roCount; 
					for($x = 0;$x<$txtCount;$x++){
						printf(
							'<p class = "'.$keyName.'">
							<input class="regular-text" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.'][0]" id="'.$keyName.'_'.$x.'_0" value="%s" style="width: 100px" readonly="readonly">：
							<input class="regular-text" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.'][1]" id="'.$keyName.'_'.$x.'_1" value="%s">',
							isset( $optionsArray[$keyName][$x][0] ) ? esc_attr( $optionsArray[$keyName][$x][0]) : isset($defArray[$keyName][$x][0])?esc_attr($defArray[$keyName][$x][0]):'',
							isset( $optionsArray[$keyName][$x][1] ) ? esc_attr( $optionsArray[$keyName][$x][1]) : isset($defArray[$keyName][$x][1])?esc_attr($defArray[$keyName][$x][1]):''
						);
					}
				} else{ //这个可能性应该是没有
					for($x = 0;$x<$txtCount;$x++){
						printf(
							'<p class = "'.$keyName.'">
							<input class="regular-text" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.'][0]" id="'.$keyName.'_'.$x.'_0" value="%s" style="width: 200px">：
							<input class="regular-text" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.'][1]" id="'.$keyName.'_'.$x.'_1" value="%s">
							<input class="button delbtn" keyname="'.$keyName.'" arrtype="'.$type.'" type="button" name="'.$keyName.'_delbtn'.$x.'" id="'.$keyName.'_delbtn'.$x.'" value="-"></p>',
							isset( $optionsArray[$keyName][$x][0] ) ? esc_attr( $optionsArray[$keyName][$x][0]) : isset($defArray[$keyName][$x][0])?esc_attr($defArray[$keyName][$x][0]):'',
							isset( $optionsArray[$keyName][$x][1] ) ? esc_attr( $optionsArray[$keyName][$x][1]) : isset($defArray[$keyName][$x][1])?esc_attr($defArray[$keyName][$x][1]):''
						);
					}
					echo '<p class="addBtn"><input class="button addbtn" keyname="'.$keyName.'" arrtype="'.$type.'" type="button" value="+ 点击此处增加一条" id="'.$keyName.'_addbtn" /></p>';
				}
			break;
			case 'List':
				for($x = 0;$x<$txtCount;$x++){
					printf(
						'<p class = "'.$keyName.'">
						<input class="regular-text textArray" type="text" name="live_2d_advanced_option_name['.$keyName.']['.$x.']" id="'.$keyName.'_'.$x.'" value="%s">
						<input class="button delbtn" keyname="'.$keyName.'" arrtype="'.$type.'" type="button" name="'.$keyName.'_delbtn'.$x.'" id="'.$keyName.'_delbtn'.$x.'" value="-"></p>',
						isset( $optionsArray[$keyName][$x] ) ? esc_attr( $optionsArray[$keyName][$x]) : isset($defArray[$keyName][$x])?esc_attr($defArray[$keyName][$x]):''
					);
				}
				echo '<p class="addBtn"><input class="button addbtn" keyname="'.$keyName.'" arrtype="'.$type.'" type="button" value="+ 点击此处增加一条" id="'.$keyName.'_addbtn" /></p>';
			break;
		}
	}
}
?>
