<?php
class live2D_Settings_Style {
    private $live_2d__options;
    public function live_2d_settings_style_init() {
        $this->live_2d__options = get_option( 'live_2d_settings_option_name' );

        add_settings_section(
            'live_2d_setting_style_section', // id
            '这里可以设置看板娘的外观大小', // title
            array( $this, 'live_2d_style_section_info' ), // callback
            'live-2d-settings-style' // page
        );

        add_settings_field(
            'modelStorage', // id
            '是否记录用户上次选择的样式', // title
            array( $this, 'modelStorage_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        
        add_settings_field(
            'modelRandMode', // id
            '模型切换方式', // title
            array( $this, 'modelRandMode_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        add_settings_field(
            'modelTexturesRandMode', // id
            '材质切换方式', // title
            array( $this, 'modelTexturesRandMode_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        

        add_settings_field(
            'waifuSize', // id
            '看板娘大小', // title
            array( $this, 'waifuSize_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        add_settings_field(
            'waifuMinWidth', // id
            '面页小于指定宽度(px) <br/>隐藏看板娘', // title
            array( $this, 'waifuMinWidth_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        add_settings_field(
            'waifuEdgeSide', // id
            '看板娘贴边方向', // title
            array( $this, 'waifuEdgeSide_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        add_settings_field(
            'waifuEdgeSize', // id
            '看板娘贴边距离(px)', // title
            array( $this, 'waifuEdgeSize_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        add_settings_field(
            'waifuDraggable', // id
            '拖拽样式', // title
            array( $this, 'waifuDraggable_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );

        add_settings_field(
            'waifuDraggableRevert', // id
            '松开鼠标还原拖拽位置', // title
            array( $this, 'waifuDraggableRevert_callback' ), // callback
            'live-2d-settings-style', // page
            'live_2d_setting_style_section' // section
        );
    }

    public function live_2d_style_section_info(){

    }

    public function modelStorage_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['modelStorage'] ) && $this->live_2d__options['modelStorage'] === true ) ? 'checked' : '' ; ?>
        <label for="modelStorage-0"><input type="radio" name="live_2d_settings_option_name[modelStorage]" id="modelStorage-0" value="1" <?php echo $checked; ?>> 是</label><br>
        <?php $checked = ( isset( $this->live_2d__options['modelStorage'] ) && $this->live_2d__options['modelStorage'] === false ) ? 'checked' : '' ; ?>
        <label for="modelStorage-1"><input type="radio" name="live_2d_settings_option_name[modelStorage]" id="modelStorage-1" value="0" <?php echo $checked; ?>> 否</label></fieldset> <?php
    }

    public function modelRandMode_callback() {
        ?> <select name="live_2d_settings_option_name[modelRandMode]" id="modelRandMode">
            <?php $selected = (isset( $this->live_2d__options['modelRandMode'] ) && $this->live_2d__options['modelRandMode'] === 'rand') ? 'selected' : '' ; ?>
            <option value="rand" <?php echo $selected; ?>>随机</option>
            <?php $selected = (isset( $this->live_2d__options['modelRandMode'] ) && $this->live_2d__options['modelRandMode'] === 'switch') ? 'selected' : '' ; ?>
            <option value="switch" <?php echo $selected; ?>>顺序</option>
        </select> <?php
    }

    public function modelTexturesRandMode_callback() {
        ?> <select name="live_2d_settings_option_name[modelTexturesRandMode]" id="modelTexturesRandMode">
            <?php $selected = (isset( $this->live_2d__options['modelTexturesRandMode'] ) && $this->live_2d__options['modelTexturesRandMode'] === 'rand') ? 'selected' : '' ; ?>
            <option value="rand" <?php echo $selected; ?>>随机</option>
            <?php $selected = (isset( $this->live_2d__options['modelTexturesRandMode'] ) && $this->live_2d__options['modelTexturesRandMode'] === 'switch') ? 'selected' : '' ; ?>
            <option value="switch" <?php echo $selected; ?>>顺序</option>
        </select> <?php
    }

    public function waifuSize_callback() {
         printf(
            '<input type="number" name="live_2d_settings_option_name[waifuSize][width]" id="waifuSize_width" value="%s" min="0" max="1024" /> x
            <input type="number" name="live_2d_settings_option_name[waifuSize][height]" id="waifuSize_height" value="%s" min="0" max="1024" />
            <p>由于看板娘大小不同，请自行设置：宽度 x 高度</p>',
            isset( $this->live_2d__options['waifuSize']['width'] ) ? esc_attr( $this->live_2d__options['waifuSize']['width']) : '280',
            isset( $this->live_2d__options['waifuSize']['height'] ) ? esc_attr( $this->live_2d__options['waifuSize']['height']) : '250'
        );
    }

    public function waifuMinWidth_callback() {
        printf(
            '<input type="number" name="live_2d_settings_option_name[waifuMinWidth]" id="waifuMinWidth" value="%s" min="0" max="1024" />
            <p>设置为 0 时禁用</p>',
            isset( $this->live_2d__options['waifuMinWidth'] ) ? esc_attr( $this->live_2d__options['waifuMinWidth']) : ''
        );
    }

    public function waifuEdgeSide_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['waifuEdgeSide'] ) && $this->live_2d__options['waifuEdgeSide'] === 'left' ) ? 'checked' : '' ; ?>
        <label for="waifuEdgeSide-0"><input type="radio" name="live_2d_settings_option_name[waifuEdgeSide]" id="waifuEdgeSide-0" value="left" <?php echo $checked; ?>> 左</label><br>
        <?php $checked = ( isset( $this->live_2d__options['waifuEdgeSide'] ) && $this->live_2d__options['waifuEdgeSide'] === 'right' ) ? 'checked' : '' ; ?>
        <label for="waifuEdgeSide-1"><input type="radio" name="live_2d_settings_option_name[waifuEdgeSide]" id="waifuEdgeSide-1" value="right" <?php echo $checked; ?>> 右</label></fieldset> <?php
    }

    public function waifuEdgeSize_callback() {
        printf(
            '<input class="regular-text" type="range" name="live_2d_settings_option_name[waifuEdgeSize]" id="waifuEdgeSize" value="%s" min="0" max="1024" /><span class="result"></span>',
            isset( $this->live_2d__options['waifuEdgeSize'] ) ? esc_attr( $this->live_2d__options['waifuEdgeSize']) : ''
        );
    }

    public function waifuDraggable_callback() {
        ?> <select name="live_2d_settings_option_name[waifuDraggable]" id="waifuDraggable">
            <?php $selected = (isset( $this->live_2d__options['waifuDraggable'] ) && $this->live_2d__options['waifuDraggable'] === 'disable') ? 'selected' : '' ; ?>
            <option value="disable" <?php echo $selected; ?>>禁用</option>
            <?php $selected = (isset( $this->live_2d__options['waifuDraggable'] ) && $this->live_2d__options['waifuDraggable'] === 'axis-x') ? 'selected' : '' ; ?>
            <option value="axis-x" <?php echo $selected; ?>>只能水平拖拽</option>
            <?php $selected = (isset( $this->live_2d__options['waifuDraggable'] ) && $this->live_2d__options['waifuDraggable'] === 'unlimited') ? 'selected' : '' ; ?>
            <option value="unlimited" <?php echo $selected; ?>>自由拖拽</option>
        </select> <?php
    }

    public function waifuDraggableRevert_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->live_2d__options['waifuDraggableRevert'] ) && $this->live_2d__options['waifuDraggableRevert'] === true ) ? 'checked' : '' ; ?>
        <label for="waifuDraggableRevert-0"><input type="radio" name="live_2d_settings_option_name[waifuDraggableRevert]" id="waifuDraggableRevert-0" value="1" <?php echo $checked; ?>> 还原</label><br>
        <?php $checked = ( isset( $this->live_2d__options['waifuDraggableRevert'] ) && $this->live_2d__options['waifuDraggableRevert'] === false ) ? 'checked' : '' ; ?>
        <label for="waifuDraggableRevert-1"><input type="radio" name="live_2d_settings_option_name[waifuDraggableRevert]" id="waifuDraggableRevert-1" value="0" <?php echo $checked; ?>> 不还原</label></fieldset> <?php
    }
}
?>