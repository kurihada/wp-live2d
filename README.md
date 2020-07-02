# Live2D WordPress 插件

- 基于Live2D 看板娘前端 HTML 源码改写
- 插件可在WordPress后台通过插件搜索获得 https://wordpress.org/plugins/live-2d/ 记得给个好评！

### 更新

= 1.6.1 =

1. 新增工具栏图标颜色和鼠标经过时的颜色控制
2. 放开看板娘提示框的尺寸控制
3. 修正设置文案准确性
4. 修正文本框与数字类型内容，强类型语言应该有的样子
5. type="range" 不是很好用，我觉得不够直观，只在一个功能上使用了
6. 减少了设置项：
- waifu-tips.js位置没有必要进行设置，我不说您都不知道是什么
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

> ( ˃ ˄ ˂̥̥ ) 都看到这了，点个 Star 吧 ~

[Flat UI Free][1]  
[waifu-tips.js / ©journey-ad / CC BY-NC-SA 4.0][2]  
[fghrsh.net][3]  
[hclonely.com][4]


  [1]: https://designmodo.com/flat-free/ "Flat UI Free"
  [2]: https://imjad.cn/ "猫与向日葵"
  [3]: https://www.fghrsh.net/post/123.html "fghrsh.net"
  [4]: https://github.com/HCLonely/Live2dV3 "hclonely.com 的Live2D v3版本基础上进行修改"
  
- 请勿将本插件使用在商业网站中！
- Do not use this plugin on commercial websites！
