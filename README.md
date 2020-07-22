# Live2D WordPress 插件

- 基于Live2D 看板娘前端 HTML 源码改写
- 插件可在WordPress后台通过插件搜索获得 https://wordpress.org/plugins/live-2d/ 记得给个好评！

### 更新

= 1.7.0 =

1. 对moc3 鼠标事件进行算法修改，现在模型头部可正确的看鼠标行动了
2. 新增moc3截图功能，可以点击截图按钮拍下看板娘了
3. 去掉对moc3模型自动x2倍的缩放算法，改为用户自行调整
4. 追加了帮助信息，您可以通过后台查看帮助了解具体内容。

= 1.6.3 =

今后大部分更新针对live2d.js文件，请更新之后清理您的cdn加速，以便缓存新版本js文件

1. 对于Cubism Live2D SDK 4.0的鼠标事件进行算法修改
2. moc3模型的鼠标跟随视角更宽广
3. moc3模型背景透明
4. 您可以直接将后台api地址更换为model3.json的相对地址，以展示moc3的模型，这个地址可以是一个jsdelivr.com

= 1.6.2 =

1. 本次更新将会实装 Cubism Live2D SDK 4.0 以便测试版本
2. 由于打包JS文件变大，我会尽量在2.0上线之前进行拆分
3. 新增：模型缩放大小控制，您可以在后台自由设置模型在画布中的缩放倍数
4. 修正：默认模型 ID改为手动填写（我通过来访页面找到了各位的网站，发现我如果固定这个选项会给各位带来不便）
5. 如果有问题欢迎在Github上反馈[issues](https://github.com/jiangweifang/wp-live2d/issues)
6. 本次更新不会改变您当前的任何设置。
7. 在樱花庄的白猫主题中测试兼容性正常，请在使用之前清理之前安装的Live2D功能避免JS冲突

= 1.6.1 =

1. 新增工具栏图标颜色和鼠标经过时的颜色控制
2. 放开看板娘提示框的尺寸控制
3. 修正设置文案准确性
4. 修正文本框与数字类型内容，强类型语言应该有的样子
5. type="range" 不是很好用，我觉得不够直观，只在一个功能上使用了
6. 减少了设置项：
- waifu-tips.js位置没有必要进行设置，有可能带来不必要的麻烦
- 主页地址设置，您已经在WordPress中设置过了，没有必要再设置一次，我将会自己读取他
7. 删除了一些没有什么用处的JS判断，精简waifu-tips.js的代码
8. 修正了一个Chrome浏览器中的警告
9. Live2D容器z轴样式提升至20，Tips的z轴提升至21，从视觉上可以看出消息提示显示在人物上方。

以下是默认值：
- 工具栏图标颜色：#5b6c7d
- 鼠标触碰时图标颜色：#34495e

= 1.6.0 =

1. 增加提示框的颜色设置，可对提示框的底色，边框，阴影，进行rgba设置，可以对文字颜色进行rgb设置
2. 新增高亮显示方式，可在设置中修改高亮显示的颜色
3. 新增帮助菜单，对高级设置进行了一些说明
4. 修正了代码中冗余的一些内容
5. 更新请注意，更新完成后请重新设置提示框的颜色，否则提示框是透明的。

以下是默认值：
- 提示框背景色：rgba(236, 217, 188, 0.5)
- 边框颜色：rgba(224, 186, 140, 0.62)
- 阴影颜色：rgba(191, 158, 118, 0.2)
- 字体颜色：#32373c
- 高亮提醒颜色：#0099cc

### 特性

- 基于 API 加载模型，支持 定制 提示语
- 增加：可通过WordPress后台进行参数设置，易用性++
- 增加：可后台设置看板娘样式，可直接设置宽高度等
- 支持多种一言接口，基于 JQuery UI 实现拖拽，JQuery UI引用WordPress内置，无需担心加载延迟
- 增加：可视化设置并生成waifu-tips.json，避免手动修改JSON

### 更新计划2.0

- Cubism 2.1 SDK 确实太老了，为了可以扩展更多的皮肤，下一个大版本更新（2.0版）将会引入Cubism 4.0 WebGL，对于所有的模型都需要重新制作
- 新模型的API源代码，将会调4.0模型进行展示

### 食用方法

1. 在WordPress后台添加插件压缩包安装
2. 点击启用按钮开始使用看板娘。


## 版权声明

[Flat UI Free][1]  
[live2d_src / ©journey-ad / GPL v2.0][2]  
[fghrsh.net][3]  

  [1]: https://designmodo.com/flat-free/ "Flat UI Free"
  [2]: https://github.com/journey-ad/live2d_src "基于 #fea64e4 的修改版"
  [3]: https://www.fghrsh.net/post/123.html "fghrsh.net"
  
- 请勿将本插件使用在商业网站中！
- Do not use this plugin on commercial websites！
