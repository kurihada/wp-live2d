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
            '提示框字体', // title
            array( $this, 'waifuFontSize_callback' ), // callback
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
        ?> <select name="live_2d_settings_option_name[waifuTipsSize]" id="waifuTipsSize">
            <?php $selected = (isset( $this->live_2d__options['waifuTipsSize'] ) && $this->live_2d__options['waifuTipsSize'] === '250x70') ? 'selected' : '' ; ?>
            <option <?php echo $selected; ?>>250x70</option>
            <?php $selected = (isset( $this->live_2d__options['waifuTipsSize'] ) && $this->live_2d__options['waifuTipsSize'] === '570x150') ? 'selected' : '' ; ?>
            <option <?php echo $selected; ?>>570x150</option>
        </select> <?php
    }

    public function waifuFontSize_callback() {
        printf(
            '<input class="regular-text" type="text" name="live_2d_settings_option_name[waifuFontSize]" id="waifuFontSize" value="%s">',
            isset( $this->live_2d__options['waifuFontSize'] ) ? esc_attr( $this->live_2d__options['waifuFontSize']) : ''
        );
    }
}
?>