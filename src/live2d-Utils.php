<?php

class live2D_Utils{

    // $keyName options中的key值
	// $type 有3个选择：Selector（用于带有选择器的数组），Array（纯数组），List（只有文本的数组列表）
	// $defArray 是数组默认值，可在callback函数中确定默认值（必填）
    // $readonly 让第一组input 只读
	public static function loopMsg($keyName,$type = 'List',$defArray ,$readonly = true ,$optName = 'live_2d_advanced_option_name'){
		$optionsArray = get_option($optName);
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
    
    public function update_Waifu_JsonFile($jsonArray){
        file_put_contents(plugin_dir_path(__FILE__)  . '..\\assets\\waifu-tips.json',json_encode($jsonArray));
    }

    public function advanced_json($value) {
		$result = array();
	
		$result["waifu"] = $this->waifuMsg_Json($value);
		
		$result["mouseover"] = $this->mouseOverMsg_Json($value['mouseover_msg']);
		
		$result["click"] = $this->clickMsg_Json($value['click_selector'],$value['click_msg']);
		
		$result["seasons"] = $this->seasonsMsg_Json($value['seasons_msg']);
		
		return $result;
	}
	
	// waifu节点组装，此节点主要是提示消息
	public function waifuMsg_Json($value){
		$msg = array();
		if(isset($value['console_open_msg'])){
			$msg["console_open_msg"] = $value['console_open_msg'];
		}else{
			$msg["console_open_msg"] = array("哈哈，你打开了控制台，是想要看看我的秘密吗？");
		}

		if(isset($value['copy_message'])){
			$msg["copy_message"] = $value['copy_message'];
		}else{
			$msg["copy_message"] = array("你都复制了些什么呀，转载要记得加上出处哦");
		}

		if(isset($value['screenshot_message'])){
			$msg["screenshot_message"] = $value['screenshot_message'];
		}else{
			$msg["screenshot_message"] = array("照好了嘛，是不是很可爱呢？");
		}

		if(isset($value['hidden_message'])){
			$msg["hidden_message"] = $value['hidden_message'];
		}else{
			$msg["hidden_message"] = array("我们还能再见面的吧…？");
		}

		if(isset($value['load_rand_textures'])){
			$msg["load_rand_textures"] = $value['load_rand_textures'];
		}else{
			$msg["load_rand_textures"] = array("我还没有其他衣服呢", "我的新衣服好看嘛");
		}

		$msg["hour_tips"] = $this->hourTips_Json($value['hour_tips']);
		$msg["referrer_message"] = $this->referrerMsg_Json($value['referrer_message']);
		$msg["referrer_hostname"] = $this->referrerHost_Json($value['referrer_hostname']);
		$msg["hitokoto_api_message"] = $this->hitokotoApi_Json($value['hitokoto_api_message']);
		return $msg;
	}
	
	// 时间段提示语
	public function hourTips_Json($arr){
		$hourTips = array();
		if(isset($arr)){
			foreach($arr as $value){
				$hourTips[$value[0]]=array($value[1]);
			}
		} else {
			$hourTips["t5-7"]=array("早上好！一日之计在于晨，美好的一天就要开始了");
			$hourTips["t7-11"]=array("上午好！工作顺利嘛，不要久坐，多起来走动走动哦！");
			$hourTips["t11-14"]=array("中午了，工作了一个上午，现在是午餐时间！");
			$hourTips["t14-17"]=array("午后很容易犯困呢，今天的运动目标完成了吗？");
			$hourTips["t17-19"]=array("傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红~");
			$hourTips["t19-21"]=array("晚上好，今天过得怎么样？");
			$hourTips["t21-23"]=array("已经这么晚了呀，早点休息吧，晚安~");
			$hourTips["t23-5"]=array("你是夜猫子呀？这么晚还不睡觉，明天起的来嘛");
			$hourTips["default"]=array("嗨~ 快来逗我玩吧！");
		}
		return $hourTips;
	}
	
	// 来自搜索引擎的问候
	public function referrerMsg_Json($arr){
		$referrerMsg = array();
		if(isset($arr)){
			foreach($arr as $value){
				$referrerMsg[$value[0]]=array($value[1]);
			}
		} else {
			$referrerMsg["localhost"] = array("欢迎阅读<span style=\"color:#0099cc;\">『{title}』</span>");
			$referrerMsg["baidu"] = array("Hello! 来自 百度搜索 的朋友<br>你是搜索 <span style=\"color:#0099cc;\">{keyword}</span> 找到的我吗？");
			$referrerMsg["so"] = array("Hello! 来自 360搜索 的朋友<br>你是搜索 <span style=\"color:#0099cc;\">{keyword}</span> 找到的我吗？");
			$referrerMsg["google"] = array("Hello! 来自 谷歌搜索 的朋友<br>欢迎阅读<span style=\"color:#0099cc;\">『{title}』</span>");
			$referrerMsg["default"] = array("Hello! 来自 <span style=\"color:#0099cc;\">{website}</span> 的朋友");
			$referrerMsg["none"] = array("欢迎阅读<span style=\"color:#0099cc;\">『{title}』</span>");
		}
		return $referrerMsg;
	}
	
	// 确定自己网站的域名
	public function referrerHost_Json($arr){
		$referrerHost = array();
		if(isset($arr)){
			foreach($arr as $value){
				$referrerHost[$value[0]]=array($value[1]);
			}
		} else {
			$referrerHost["example.com"] = array("示例网站");
			$referrerHost["www.fghrsh.net"] = array("FGHRSH 的博客");
		}
		return $referrerHost;
	}
	
	// 一言API返回的结果
	public function hitokotoApi_Json($arr){
		$hitokotoMsg = array();
		if(isset($arr)){
			foreach($arr as $value){
				$hitokotoMsg[$value[0]]=array($value[1]);
			}
		} else {
			$hitokotoMsg["lwl12.com"] = array("这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>|，是 <span style=\"color:#0099cc;\">{creator}</span> 投稿的。");
			$hitokotoMsg["fghrsh.net"] = array("这句一言出处是 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">FGHRSH</span> 在 {date} 收藏的！");
			$hitokotoMsg["jinrishici.com"] = array("这句诗词出自 <span style=\"color:#0099cc;\">《{title}》</span>，是 {dynasty}诗人 {author} 创作的！");
			$hitokotoMsg["hitokoto.cn"] = array("这句一言来自 <span style=\"color:#0099cc;\">『{source}』</span>，是 <span style=\"color:#0099cc;\">{creator}</span> 在 hitokoto.cn 投稿的。");
		}
		return $hitokotoMsg;
	}
	
	// 鼠标浮动事件（可自定义）
	public function mouseOverMsg_Json($arrOpt){
		$mouseOverMsg = array();
		if(isset ($arrOpt)){
			foreach($arrOpt as $key=> $value){
				$mouseOverMsg[$key]["selector"]= $value["selector"];
				$mouseOverMsg[$key]["text"]= $value["text"];
			}
		} else {
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
		}
		//这里要有一个循环来自定义指定的鼠标浮动事件
		
		return $mouseOverMsg;
	}
	// 鼠标点击事件（可自定义）
	public function clickMsg_Json($selector,$textArr){
		$clickMsg = array();
		$clickMsg[0]["selector"]=$selector;
		$clickMsg[0]["text"] = $textArr;
		//这里要有一个循环来自定义指定的鼠标点击事件
		return $clickMsg;
	}
	
	// 节日事件（可自定义）
	public function seasonsMsg_Json($arr){
		$seasonsMsg = array();
		if(isset ($arr)){
			foreach($arr as $key=> $value){
				$seasonsMsg[$key]["date"]= $value[0];
				$seasonsMsg[$key]["text"]= $value[1];
			}
		} else {
			$seasonsMsg[0]["date"]= "01/01";
			$seasonsMsg[0]["text"]= array("<span style=\"color:#0099cc;\">元旦</span>了呢，新的一年又开始了，今年是{year}年~");
			//这里要有一个循环来自定义指定节日事件
		}
		return $seasonsMsg;
	}
}

?>