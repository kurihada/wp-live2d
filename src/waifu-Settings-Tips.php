<?php
class live2D_Settings_Tips {
    private $live_2d__options;
    public function live_2d_settings_tips_init() {
        $this->live_2d__options = get_option( 'live_2d_settings_option_name' );
        

        add_settings_section(
            'live_2d_setting_tips_section', // id
            '提示框设置', // title
            array( $this, 'live_2d_tips_section_info' ), // callback
            'live-2d-settings-tips' // page
        );

        add_settings_field(
            'showHitokoto', // id
            '显示一言', // title
            array( $this, 'showHitokoto_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'showF12Status', // id
            '显示加载状态', // title
            array( $this, 'showF12Status_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'showF12Message', // id
            '显示看板娘消息', // title
            array( $this, 'showF12Message_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'showF12OpenMsg', // id
            '显示控制台打开提示', // title
            array( $this, 'showF12OpenMsg_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'showCopyMessage', // id
            '显示 复制内容 提示', // title
            array( $this, 'showCopyMessage_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'showWelcomeMessage', // id
            '显示进入面页欢迎词', // title
            array( $this, 'showWelcomeMessage_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuTipsSize', // id
            '提示框大小', // title
            array( $this, 'waifuTipsSize_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuFontSize', // id
            '提示框字号(px)', // title
            array( $this, 'waifuFontSize_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuTipsColor', // id
            '提示框背景色', // title
            array( $this, 'waifuTipsColor_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuBorderColor', // id
            '边框颜色', // title
            array( $this, 'waifuBorderColor_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuShadowColor', // id
            '阴影颜色', // title
            array( $this, 'waifuShadowColor_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuFontsColor', // id
            '提示框文字颜色', // title
            array( $this, 'waifuFontsColor_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );

        add_settings_field(
            'waifuHighlightColor', // id
            '高亮文字颜色', // title
            array( $this, 'waifuHighlightColor_callback' ), // callback
            'live-2d-settings-tips', // page
            'live_2d_setting_tips_section' // section
        );
    }

    public function live_2d_tips_section_info(){
        
    }

    public function showHitokoto_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['showHitokoto'] ) && $this->live_2d__options['showHitokoto'] === true ) ? 'checked' : '' ; ?>
        <label for="showHitokoto-0"><input type="radio" name="live_2d_settings_option_name[showHitokoto]" id="showHitokoto-0" value="1" <?php echo $checked; ?>> 显示</label><br>
        <?php $checked = ( isset( $this->live_2d__options['showHitokoto'] ) && $this->live_2d__options['showHitokoto'] === false ) ? 'checked' : '' ; ?>
        <label for="showHitokoto-1"><input type="radio" name="live_2d_settings_option_name[showHitokoto]" id="showHitokoto-1" value="0" <?php echo $checked; ?>> 隐藏</label></fieldset> <?php
    }

    public function showF12Status_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['showF12Status'] ) && $this->live_2d__options['showF12Status'] === true ) ? 'checked' : '' ; ?>
        <label for="showF12Status-0"><input type="radio" name="live_2d_settings_option_name[showF12Status]" id="showF12Status-0" value="1" <?php echo $checked; ?>> 显示</label><br>
        <?php $checked = ( isset( $this->live_2d__options['showF12Status'] ) && $this->live_2d__options['showF12Status'] === false ) ? 'checked' : '' ; ?>
        <label for="showF12Status-1"><input type="radio" name="live_2d_settings_option_name[showF12Status]" id="showF12Status-1" value="0" <?php echo $checked; ?>> 隐藏</label></fieldset> <?php
    }

    public function showF12Message_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['showF12Message'] ) && $this->live_2d__options['showF12Message'] === true ) ? 'checked' : '' ; ?>
        <label for="showF12Message-0"><input type="radio" name="live_2d_settings_option_name[showF12Message]" id="showF12Message-0" value="1" <?php echo $checked; ?>> 显示</label><br>
        <?php $checked = ( isset( $this->live_2d__options['showF12Message'] ) && $this->live_2d__options['showF12Message'] === false ) ? 'checked' : '' ; ?>
        <label for="showF12Message-1"><input type="radio" name="live_2d_settings_option_name[showF12Message]" id="showF12Message-1" value="0" <?php echo $checked; ?>> 隐藏</label></fieldset> <?php
    }

    public function showF12OpenMsg_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['showF12OpenMsg'] ) && $this->live_2d__options['showF12OpenMsg'] === true ) ? 'checked' : '' ; ?>
        <label for="showF12OpenMsg-0"><input type="radio" name="live_2d_settings_option_name[showF12OpenMsg]" id="showF12OpenMsg-0" value="1" <?php echo $checked; ?>> 显示</label><br>
        <?php $checked = ( isset( $this->live_2d__options['showF12OpenMsg'] ) && $this->live_2d__options['showF12OpenMsg'] === false ) ? 'checked' : '' ; ?>
        <label for="showF12OpenMsg-1"><input type="radio" name="live_2d_settings_option_name[showF12OpenMsg]" id="showF12OpenMsg-1" value="0" <?php echo $checked; ?>> 隐藏</label></fieldset> <?php
    }

    public function showCopyMessage_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['showCopyMessage'] ) && $this->live_2d__options['showCopyMessage'] === true ) ? 'checked' : '' ; ?>
        <label for="showCopyMessage-0"><input type="radio" name="live_2d_settings_option_name[showCopyMessage]" id="showCopyMessage-0" value="1" <?php echo $checked; ?>> 显示</label><br>
        <?php $checked = ( isset( $this->live_2d__options['showCopyMessage'] ) && $this->live_2d__options['showCopyMessage'] === false ) ? 'checked' : '' ; ?>
        <label for="showCopyMessage-1"><input type="radio" name="live_2d_settings_option_name[showCopyMessage]" id="showCopyMessage-1" value="0" <?php echo $checked; ?>> 隐藏</label></fieldset> <?php
    }

    public function showWelcomeMessage_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['showWelcomeMessage'] ) && $this->live_2d__options['showWelcomeMessage'] === true ) ? 'checked' : '' ; ?>
        <label for="showWelcomeMessage-0"><input type="radio" name="live_2d_settings_option_name[showWelcomeMessage]" id="showWelcomeMessage-0" value="1" <?php echo $checked; ?>> 显示</label><br>
        <?php $checked = ( isset( $this->live_2d__options['showWelcomeMessage'] ) && $this->live_2d__options['showWelcomeMessage'] === false ) ? 'checked' : '' ; ?>
        <label for="showWelcomeMessage-1"><input type="radio" name="live_2d_settings_option_name[showWelcomeMessage]" id="showWelcomeMessage-1" value="0" <?php echo $checked; ?>> 隐藏</label></fieldset> <?php
    }
    
    public function waifuTipsSize_callback() {
        printf(
            '<input type="number" name="live_2d_settings_option_name[waifuTipsSize][width]" id="waifuTipsSize_width" value="%s" min = "0" max="1024" > x
            <input type="number" name="live_2d_settings_option_name[waifuTipsSize][height]" id="waifuTipsSize_height" value="%s" min = "0" max="1024" >
            <p>由于提示大小不同，请自行设置：宽度 x 高度</p>',
            isset( $this->live_2d__options['waifuTipsSize']['width'] ) ? esc_attr( $this->live_2d__options['waifuTipsSize']['width']) : 250,
            isset( $this->live_2d__options['waifuTipsSize']['height'] ) ? esc_attr( $this->live_2d__options['waifuTipsSize']['height']) : 70
        );
    }

    public function waifuFontSize_callback() {
        printf(
            '<input type="number" name="live_2d_settings_option_name[waifuFontSize]" id="waifuFontSize" value="%s" min = "0" max="50" >',
            isset( $this->live_2d__options['waifuFontSize'] ) ? esc_attr( $this->live_2d__options['waifuFontSize']) : 12
        );
    }

    public function waifuTipsColor_callback(){
        printf(
            '<input type="text" class="color-picker" data-alpha="true" name="live_2d_settings_option_name[waifuTipsColor]" id="waifuTipsColor" value="%s" />',
            isset( $this->live_2d__options['waifuTipsColor'] ) ? esc_attr( $this->live_2d__options['waifuTipsColor']) : ''
        );
    }

    public function waifuBorderColor_callback(){
        printf(
            '<input type="text" class="color-picker" data-alpha="true" name="live_2d_settings_option_name[waifuBorderColor]" id="waifuBorderColor" value="%s" />',
            isset( $this->live_2d__options['waifuBorderColor'] ) ? esc_attr( $this->live_2d__options['waifuBorderColor']) : ''
        );
    }

    public function waifuShadowColor_callback(){
        printf(
            '<input type="text" class="color-picker" data-alpha="true" name="live_2d_settings_option_name[waifuShadowColor]" id="waifuShadowColor" value="%s" />',
            isset( $this->live_2d__options['waifuShadowColor'] ) ? esc_attr( $this->live_2d__options['waifuShadowColor']) : ''
        );
    }

    public function waifuFontsColor_callback(){
        printf(
            '<input type="text" class="color-picker" name="live_2d_settings_option_name[waifuFontsColor]" id="waifuFontsColor" value="%s"  />',
            isset( $this->live_2d__options['waifuFontsColor'] ) ? esc_attr( $this->live_2d__options['waifuFontsColor']) : ''
        );
    }

    public function waifuHighlightColor_callback(){
        printf(
            '<input type="text" class="color-picker" name="live_2d_settings_option_name[waifuHighlightColor]" id="waifuHighlightColor" value="%s"  />',
            isset( $this->live_2d__options['waifuHighlightColor'] ) ? esc_attr( $this->live_2d__options['waifuHighlightColor']) : ''
        );
    }
}
?>