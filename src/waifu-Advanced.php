<?php
require(dirname(__FILE__)  . '/live2d-Utils.php');
class live2D_Advanced {
	
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
			$sanitary_values['console_open_msg'] = $input['console_open_msg'] ;
		}

		if ( isset( $input['copy_message'] ) ) {
			$sanitary_values['copy_message'] = $input['copy_message'] ;
		}

		if ( isset( $input['screenshot_message'] ) ) {
			$sanitary_values['screenshot_message'] = $input['screenshot_message'] ;
		}

		if ( isset( $input['hidden_message'] ) ) {
			$sanitary_values['hidden_message'] =  $input['hidden_message'];
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
		live2D_Utils::loopMsg('console_open_msg','List');
	}
	//内容被复制触发提醒（支持多句随机）
	public function copy_message_callback() {
		live2D_Utils::loopMsg('copy_message','List');
	}
	//看板娘截图提示语（支持多句随机）
	public function screenshot_message_callback() {
		live2D_Utils::loopMsg('screenshot_message','List');
	}
	//看板娘隐藏提示语（支持多句随机）
	public function hidden_message_callback() {
		live2D_Utils::loopMsg('hidden_message','List');
	}
	//随机材质提示语（暂不支持多句）
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
	//时间段欢迎语（支持多句随机）
	public function hour_tips_callback() {
		live2D_Utils::loopMsg('hour_tips','Array');
		echo '<p>时间按照t{开始小时}-{结束小时}的方式填写，例如：t5-7或t7-11（避免改错，目前此项无法更改）</p>';
	}


	// 请求来源欢迎语（不支持多句）
	public function referrer_message_callback() {
		live2D_Utils::loopMsg('referrer_message','Array');
		echo '<p>请务必不要修改{}中的内容，{title}网站标题、{keyword}关键词、{website}站点名称</p>';
	}
	//请求来源自定义名称（根据 host，支持多句随机）
	public function referrer_hostname_callback() {
		live2D_Utils::loopMsg('referrer_hostname','Array' , false);
	}
	
	//一言 API 输出模板（不支持多句随机）
	public function hitokoto_api_message_callback() {
		live2D_Utils::loopMsg('hitokoto_api_message','Array');
		echo '<p>请务必不要修改{}中的内容，lwl12.com接口会有没有作者的情况语句中需要用“|”进行分割</p>';//lwl12.com会有没有作者的情况
	}
	//鼠标触发提示（根据 CSS 选择器，支持多句随机）
	public function mouseover_msg_callback() {	
		live2D_Utils::loopMsg('mouseover_msg','Selector');
		echo '<p>鼠标悬停位置的<a href="https://www.w3school.com.cn/jquery/jquery_ref_selectors.asp" target="_blank">jQuery选择器</a></p>';
	}
	
	public function click_selector_callback(){
		printf(
			'<input class="regular-text" type="text" name="live_2d_advanced_option_name[click_selector]" id="click_selector" value="%s">',
			isset( $this->live_2d_advanced_options['click_selector'] ) ? esc_attr( $this->live_2d_advanced_options['click_selector']) : ''
		);
	}
	
	// 鼠标点击触发提示（根据 CSS 选择器，支持多句随机）
	public function click_msg_callback() {
		live2D_Utils::loopMsg('click_msg','List');
		echo '<p>点击看板娘会循环以上的每一行点击事件</p>';
	}
	
	
	//节日提示（日期段，支持多句随机）
	public function seasons_msg_callback() {
		live2D_Utils::loopMsg('seasons_msg','Array',false);
		echo '<p>在指定的日期说提示语，日期的规则为MM/dd，例如2月14日为 02/14，可填写一个时间区间，格式为11/05-11/12。</p>';
	}

	
	public function live_2d_advanced_section_info() {

	}

	public function install_Default_Settings(){
		$live_2d_advanced = get_option( 'live_2d_advanced_option_name' );
		if($live_2d_advanced==null){
			$defKey = array();
			//控制台被打开提醒（支持多句随机）
			$defKey['console_open_msg'][0] = '哈哈，你打开了控制台，是想要看看我的秘密吗？';
			//内容被复制触发提醒（支持多句随机）
			$defKey['copy_message'][0] = '你都复制了些什么呀，转载要记得加上出处哦！';
			//看板娘截图提示语（支持多句随机）
			$defKey['screenshot_message'][0] = '照好了嘛，是不是很可爱呢？';
			//看板娘隐藏提示语（支持多句随机）
			$defKey['hidden_message'][0] = '我们还能再见面的吧…？';
			//随机材质提示语（暂不支持多句）
			$defKey['load_rand_textures'][0]='我还没有其他衣服呢';
			$defKey['load_rand_textures'][1]='我的新衣服好看嘛?';
			//时间提示
			$defKey['hour_tips'][0][0] = 't5-7';
			$defKey['hour_tips'][0][1] = '早上好！一日之计在于晨，美好的一天就要开始了';
			$defKey['hour_tips'][1][0] = 't7-11';
			$defKey['hour_tips'][1][1] = '上午好！工作顺利嘛，不要久坐，多起来走动走动哦！';
			$defKey['hour_tips'][2][0] = 't11-14';
			$defKey['hour_tips'][2][1] = '中午了，工作了一个上午，现在是午餐时间！';
			$defKey['hour_tips'][3][0] = 't14-17';
			$defKey['hour_tips'][3][1] = '午后很容易犯困呢，今天的运动目标完成了吗？';
			$defKey['hour_tips'][4][0] = 't17-19';
			$defKey['hour_tips'][4][1] = '傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红~';
			$defKey['hour_tips'][5][0] = 't19-21';
			$defKey['hour_tips'][5][1] = '晚上好，今天过得怎么样？';
			$defKey['hour_tips'][6][0] = 't21-23';
			$defKey['hour_tips'][6][1] = '已经这么晚了呀，早点休息吧，晚安~';
			$defKey['hour_tips'][7][0] = 't23-5';
			$defKey['hour_tips'][7][1] = '你是夜猫子呀？这么晚还不睡觉，明天起的来嘛';
			$defKey['hour_tips'][8][0] = 'default';
			$defKey['hour_tips'][8][1] = '嗨~ 快来逗我玩吧！';
			//请求来源欢迎语（不支持多句）
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
			//请求来源自定义名称（根据 host，支持多句随机）
			$defKey['referrer_hostname'][0][0] = 'example.com';
			$defKey['referrer_hostname'][0][1] = '示例网站';
			$defKey['referrer_hostname'][1][0] = 'www.fghrsh.net';
			$defKey['referrer_hostname'][1][1] = 'FGHRSH 的博客';
			//一言 API 输出模板（不支持多句随机）
			$defKey['hitokoto_api_message'][0][0] = 'lwl12.com';
			$defKey['hitokoto_api_message'][0][1] = '这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>|，是 <span style=\"color:#0099cc;\">{creator}</span> 投稿的。';
			$defKey['hitokoto_api_message'][1][0] = 'fghrsh.net';
			$defKey['hitokoto_api_message'][1][1] = '这句一言出处是 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">FGHRSH</span> 在 {date} 收藏的！';
			$defKey['hitokoto_api_message'][2][0] = 'jinrishici.com';
			$defKey['hitokoto_api_message'][2][1] = '这句诗词出自 <span style=\"color:#0099cc;\">《{title}》</span>，是 {dynasty}诗人 {author} 创作的！';
			$defKey['hitokoto_api_message'][3][0] = 'hitokoto.cn';
			$defKey['hitokoto_api_message'][3][1] = '这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">{creator}</span> 在 hitokoto.cn 投稿的。';
			//鼠标触发提示（根据 CSS 选择器，支持多句随机）
			$defKey['mouseover_msg'][0]['selector'] = ".container a[href^='http']";
			$defKey['mouseover_msg'][0]['text'] = "要看看 <span style=\"color:#0099cc;\">{text}</span> 么？";
			$defKey['mouseover_msg'][1]['selector'] = ".fui-home";
			$defKey['mouseover_msg'][1]['text'] = "点击前往首页，想回到上一页可以使用浏览器的后退功能哦";
			$defKey['mouseover_msg'][2]['selector'] = ".fui-chat";
			$defKey['mouseover_msg'][2]['text'] = "一言一语，一颦一笑。一字一句，一颗赛艇。";
			$defKey['mouseover_msg'][3]['selector'] = ".fui-eye";
			$defKey['mouseover_msg'][3]['text'] = "嗯··· 要切换 看板娘 吗？";
			$defKey['mouseover_msg'][4]['selector'] = ".fui-user";
			$defKey['mouseover_msg'][4]['text'] = "喜欢换装 Play 吗？";
			$defKey['mouseover_msg'][5]['selector'] = ".fui-photo";
			$defKey['mouseover_msg'][5]['text'] = "要拍张纪念照片吗？";
			$defKey['mouseover_msg'][6]['selector'] = ".fui-info-circle";
			$defKey['mouseover_msg'][6]['text'] = "这里有关于我的信息呢";
			$defKey['mouseover_msg'][7]['selector'] = ".fui-cross";
			$defKey['mouseover_msg'][7]['text'] = "你不喜欢我了吗...";
			$defKey['mouseover_msg'][8]['selector'] = "#tor_show";
			$defKey['mouseover_msg'][8]['text'] = "翻页比较麻烦吗，点击可以显示这篇文章的目录呢";
			$defKey['mouseover_msg'][9]['selector'] = "#comment_go";
			$defKey['mouseover_msg'][9]['text'] = "想要去评论些什么吗？";
			$defKey['mouseover_msg'][10]['selector'] = "#night_mode";
			$defKey['mouseover_msg'][10]['text'] = "深夜时要爱护眼睛呀";
			$defKey['mouseover_msg'][11]['selector'] = "#qrcode";
			$defKey['mouseover_msg'][11]['text'] = "手机扫一下就能继续看，很方便呢";
			$defKey['mouseover_msg'][12]['selector'] = ".comment_reply";
			$defKey['mouseover_msg'][12]['text'] = "要吐槽些什么呢";
			$defKey['mouseover_msg'][13]['selector'] = "#back-to-top";
			$defKey['mouseover_msg'][13]['text'] = "回到开始的地方吧";
			$defKey['mouseover_msg'][14]['selector'] = "#author";
			$defKey['mouseover_msg'][14]['text'] = "该怎么称呼你呢";
			$defKey['mouseover_msg'][15]['selector'] = "#mail";
			$defKey['mouseover_msg'][15]['text'] = "留下你的邮箱，不然就是无头像人士了";
			$defKey['mouseover_msg'][16]['selector'] = "#url";
			$defKey['mouseover_msg'][16]['text'] = "你的家在哪里呢，好让我去参观参观";
			$defKey['mouseover_msg'][17]['selector'] = "#textarea";
			$defKey['mouseover_msg'][17]['text'] = "认真填写哦，垃圾评论是禁止事项";
			$defKey['mouseover_msg'][18]['selector'] = ".OwO-logo";
			$defKey['mouseover_msg'][18]['text'] = "要插入一个表情吗";
			$defKey['mouseover_msg'][19]['selector'] = "#csubmit";
			$defKey['mouseover_msg'][19]['text'] = "要[提交]^(Commit)了吗，首次评论需要审核，请耐心等待~";
			$defKey['mouseover_msg'][20]['selector'] = ".ImageBox";
			$defKey['mouseover_msg'][20]['text'] = "点击图片可以放大呢";
			$defKey['mouseover_msg'][21]['selector'] = "input[name=s]";
			$defKey['mouseover_msg'][21]['text'] = "找不到想看的内容？搜索看看吧";
			$defKey['mouseover_msg'][22]['selector'] = ".previous";
			$defKey['mouseover_msg'][22]['text'] = "去上一页看看吧";
			$defKey['mouseover_msg'][23]['selector'] = ".next";
			$defKey['mouseover_msg'][23]['text'] = "去下一页看看吧";
			$defKey['mouseover_msg'][24]['selector'] = ".dropdown-toggle";
			$defKey['mouseover_msg'][24]['text'] = "这里是菜单";
			$defKey['mouseover_msg'][25]['selector'] = "c-player a.play-icon";
			$defKey['mouseover_msg'][25]['text'] = "想要听点音乐吗";
			$defKey['mouseover_msg'][26]['selector'] = "c-player div.time";
			$defKey['mouseover_msg'][26]['text'] = "在这里可以调整<span style=\"color:#0099cc;\">播放进度</span>呢";
			$defKey['mouseover_msg'][27]['selector'] = "c-player div.volume";
			$defKey['mouseover_msg'][27]['text'] = "在这里可以调整<span style=\"color:#0099cc;\">音量</span>呢";
			$defKey['mouseover_msg'][28]['selector'] = "c-player div.list-button";
			$defKey['mouseover_msg'][28]['text'] = "<span style=\"color:#0099cc;\">播放列表</span>里都有什么呢";
			$defKey['mouseover_msg'][29]['selector'] = "c-player div.lyric-button";
			$defKey['mouseover_msg'][29]['text'] = "有<span style=\"color:#0099cc;\">歌词</span>的话就能跟着一起唱呢";
			// 鼠标点击触发提示（根据 CSS 选择器，支持多句随机）
			$defKey['click_selector']='.waifu #live2d';
			$defKey['click_msg'][0] = "是…是不小心碰到了吧";
			$defKey['click_msg'][1] = "萝莉控是什么呀";
			$defKey['click_msg'][2] = "你看到我的小熊了吗";
			$defKey['click_msg'][3] = "再摸的话我可要报警了！⌇●﹏●⌇";
			$defKey['click_msg'][4] = "110吗，这里有个变态一直在摸我(ó﹏ò｡)";
			//节日提示（日期段，支持多句随机）
			$defKey['seasons_msg'][0][0] = "01/01";
			$defKey['seasons_msg'][0][1] ="<span style=\"color:#0099cc;\">元旦</span>了呢，新的一年又开始了，今年是{year}年~";
			$defKey['seasons_msg'][1][0] = "02/14";
			$defKey['seasons_msg'][1][1] ="又是一年<span style=\"color:#0099cc;\">情人节</span>，{year}年找到对象了嘛~";
			$defKey['seasons_msg'][2][0] = "03/08";
			$defKey['seasons_msg'][2][1] ="今天是<span style=\"color:#0099cc;\">妇女节</span>！";
			$defKey['seasons_msg'][3][0] = "03/12";
			$defKey['seasons_msg'][3][1] ="今天是<span style=\"color:#0099cc;\">植树节</span>，要保护环境呀";
			$defKey['seasons_msg'][4][0] = "04/01";
			$defKey['seasons_msg'][4][1] ="悄悄告诉你一个秘密~<span style=\"background-color:#34495e;\">今天是愚人节，不要被骗了哦~</span>";
			$defKey['seasons_msg'][5][0] = "05/01";
			$defKey['seasons_msg'][5][1] ="今天是<span style=\"color:#0099cc;\">五一劳动节</span>，计划好假期去哪里了吗~";
			$defKey['seasons_msg'][6][0] = "06/01";
			$defKey['seasons_msg'][6][1] ="<span style=\"color:#0099cc;\">儿童节</span>了呢，快活的时光总是短暂，要是永远长不大该多好啊…";
			$defKey['seasons_msg'][7][0] = "09/03";
			$defKey['seasons_msg'][7][1] ="<span style=\"color:#0099cc;\">中国人民抗日战争胜利纪念日</span>，铭记历史、缅怀先烈、珍爱和平、开创未来。";
			$defKey['seasons_msg'][8][0] = "09/10";
			$defKey['seasons_msg'][8][1] ="<span style=\"color:#0099cc;\">教师节</span>，在学校要给老师问声好呀~";
			$defKey['seasons_msg'][9][0] = "10/01";
			$defKey['seasons_msg'][9][1] ="<span style=\"color:#0099cc;\">国庆节</span>，新中国已经成立69年了呢";
			$defKey['seasons_msg'][10][0] = "11/05-11/12";
			$defKey['seasons_msg'][10][1] ="今年的<span style=\"color:#0099cc;\">双十一</span>是和谁一起过的呢~";
			$defKey['seasons_msg'][11][0] = "12/20-12/31";
			$defKey['seasons_msg'][11][1] ="这几天是<span style=\"color:#0099cc;\">圣诞节</span>，主人肯定又去剁手买买买了~";
			add_option('live_2d_advanced_option_name',$defKey);
		}
	}
}
?>
