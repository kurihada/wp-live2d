<?php
class live2D_Settings_Base {

    private $live_2d__options;
    public function live_2d_settings_base_init() {

        $this->live_2d__options = get_option( 'live_2d_settings_option_name' );

        add_settings_section(
            'live_2d_setting_base_section', // id
            '看板娘基础设置', // title
            array( $this, 'live_2d__section_info' ), // callback
            'live-2d-settings-base' // page
        );

        add_settings_field(
            'modelAPI', // id
            '材质API ', // title
            array( $this, 'modelAPI_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'tipsMessage', // id
            'waifu-tips.json 位置', // title
            array( $this, 'tipsMessage_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'hitokotoAPI', // id
            '一言 API', // title
            array( $this, 'hitokotoAPI_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'modelId', // id
            '默认模型 ID', // title
            array( $this, 'modelId_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'modelTexturesId', // id
            '默认材质 ID', // title
            array( $this, 'modelTexturesId_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'homePageUrl', // id
            '主页地址', // title
            array( $this, 'homePageUrl_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'aboutPageUrl', // id
            '关于页地址', // title
            array( $this, 'aboutPageUrl_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );

        add_settings_field(
            'screenshotCaptureName', // id
            '看板娘截图文件名', // title
            array( $this, 'screenshotCaptureName_callback' ), // callback
            'live-2d-settings-base', // page
            'live_2d_setting_base_section' // section
        );
    }
    

    public function live_2d__section_info() {
    }

    public function modelAPI_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[modelAPI]" id="modelAPI" value="%s">',
            isset( $this->live_2d__options['modelAPI'] ) ? esc_attr( $this->live_2d__options['modelAPI']) : ''
        );
    }

    public function tipsMessage_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[tipsMessage]" id="tipsMessage" value="%s">',
            isset( $this->live_2d__options['tipsMessage'] ) ? esc_attr( $this->live_2d__options['tipsMessage']) : ''
        );
    }

    public function hitokotoAPI_callback() {
        ?> <select name="live_2d_settings_option_name[hitokotoAPI]" id="hitokotoAPI">
            <?php $selected = (isset( $this->live_2d__options['hitokotoAPI'] ) && $this->live_2d__options['hitokotoAPI'] === 'lwl12.com') ? 'selected' : '' ; ?>
            <option <?php echo $selected; ?>>lwl12.com</option>
            <?php $selected = (isset( $this->live_2d__options['hitokotoAPI'] ) && $this->live_2d__options['hitokotoAPI'] === 'hitokoto.cn') ? 'selected' : '' ; ?>
            <option <?php echo $selected; ?>>hitokoto.cn</option>
            <?php $selected = (isset( $this->live_2d__options['hitokotoAPI'] ) && $this->live_2d__options['hitokotoAPI'] === 'jinrishici.com') ? 'selected' : '' ; ?>
            <option <?php echo $selected; ?>>jinrishici.com</option>
            <?php $selected = (isset( $this->live_2d__options['hitokotoAPI'] ) && $this->live_2d__options['hitokotoAPI'] === 'fghrsh.net') ? 'selected' : '' ; ?>
            <option <?php echo $selected; ?>>fghrsh.net</option>
        </select> <?php
    }

    public function modelId_callback() {
        ?> <select name="live_2d_settings_option_name[modelId]" id="modelId">
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '1') ? 'selected' : '' ; ?>
            <option value="1" <?php echo $selected; ?>>来自药水制作师的 Pio</option>
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '2') ? 'selected' : '' ; ?>
            <option value="2" <?php echo $selected; ?>>来自药水制作师的 Tia</option>
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '3') ? 'selected' : '' ; ?>
            <option value="3" <?php echo $selected; ?>>来自 Bilibili Live 的 22</option>
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '4') ? 'selected' : '' ; ?>
            <option value="4" <?php echo $selected; ?>>来自 Bilibili Live 的 33</option>
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '5') ? 'selected' : '' ; ?>
            <option value="5" <?php echo $selected; ?>>Shizuku Talk ！这里是 Shizuku</option>
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '6') ? 'selected' : '' ; ?>
            <option value="6" <?php echo $selected; ?>>超次元游戏：海王星</option>
            <?php $selected = (isset( $this->live_2d__options['modelId'] ) && $this->live_2d__options['modelId'] === '7') ? 'selected' : '' ; ?>
            <option value="7" <?php echo $selected; ?>>艦隊これくしょん / 叢雲(むらくも)</option>
        </select> <?php
    }

    public function modelTexturesId_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[modelTexturesId]" id="modelTexturesId" value="%s">',
            isset( $this->live_2d__options['modelTexturesId'] ) ? esc_attr( $this->live_2d__options['modelTexturesId']) : ''
        );
    }

    

    public function homePageUrl_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[homePageUrl]" id="homePageUrl" value="%s">',
            isset( $this->live_2d__options['homePageUrl'] ) ? esc_attr( $this->live_2d__options['homePageUrl']) : ''
        );
    }

    public function aboutPageUrl_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[aboutPageUrl]" id="aboutPageUrl" value="%s">',
            isset( $this->live_2d__options['aboutPageUrl'] ) ? esc_attr( $this->live_2d__options['aboutPageUrl']) : ''
        );
    }

    public function screenshotCaptureName_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[screenshotCaptureName]" id="screenshotCaptureName" value="%s">',
            isset( $this->live_2d__options['screenshotCaptureName'] ) ? esc_attr( $this->live_2d__options['screenshotCaptureName']) : ''
        );
    }
}
?>