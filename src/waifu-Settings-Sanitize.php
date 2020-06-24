<?php
class live2D_Settings_Sanitize{

    public function live_2d_settings_sanitize($input) {
            
        $sanitary_values = array();
        if ( isset( $input['modelAPI'] ) ) {
            $sanitary_values['modelAPI'] = sanitize_text_field( $input['modelAPI'] );
        }

        if ( isset( $input['tipsMessage'] ) ) {
            $sanitary_values['tipsMessage'] = sanitize_text_field( $input['tipsMessage'] );
        }

        if ( isset( $input['hitokotoAPI'] ) ) {
            $sanitary_values['hitokotoAPI'] = $input['hitokotoAPI'];
        }

        if ( isset( $input['modelId'] ) ) {
            $sanitary_values['modelId'] = $input['modelId'];
        }

        if ( isset( $input['modelTexturesId'] ) ) {
            $sanitary_values['modelTexturesId'] = sanitize_text_field( $input['modelTexturesId'] );
        }

        if ( isset( $input['showToolMenu'] ) ) {
            $sanitary_values['showToolMenu'] = (Boolean)$input['showToolMenu'];
        }

        if ( isset( $input['canCloseLive2d'] ) ) {
            $sanitary_values['canCloseLive2d'] = (Boolean)$input['canCloseLive2d'];
        }

        if ( isset( $input['canSwitchModel'] ) ) {
            $sanitary_values['canSwitchModel'] = (Boolean)$input['canSwitchModel'];
        }

        if ( isset( $input['canSwitchTextures'] ) ) {
            $sanitary_values['canSwitchTextures'] = (Boolean)$input['canSwitchTextures'];
        }

        if ( isset( $input['canSwitchHitokoto'] ) ) {
            $sanitary_values['canSwitchHitokoto'] = (Boolean)$input['canSwitchHitokoto'];
        }

        if ( isset( $input['canTakeScreenshot'] ) ) {
            $sanitary_values['canTakeScreenshot'] = (Boolean)$input['canTakeScreenshot'];
        }

        if ( isset( $input['canTurnToHomePage'] ) ) {
            $sanitary_values['canTurnToHomePage'] = (Boolean)$input['canTurnToHomePage'];
        }

        if ( isset( $input['canTurnToAboutPage'] ) ) {
            $sanitary_values['canTurnToAboutPage'] = (Boolean)$input['canTurnToAboutPage'];
        }

        if ( isset( $input['modelStorage'] ) ) {
            $sanitary_values['modelStorage'] = (Boolean)$input['modelStorage'];
        }

        if ( isset( $input['modelRandMode'] ) ) {
            $sanitary_values['modelRandMode'] = $input['modelRandMode'];
        }

        if ( isset( $input['modelTexturesRandMode'] ) ) {
            $sanitary_values['modelTexturesRandMode'] = $input['modelTexturesRandMode'];
        }

        if ( isset( $input['showHitokoto'] ) ) {
            $sanitary_values['showHitokoto'] = (Boolean)$input['showHitokoto'];
        }

        if ( isset( $input['showF12Status'] ) ) {
            $sanitary_values['showF12Status'] = (Boolean)$input['showF12Status'];
        }

        if ( isset( $input['showF12Message'] ) ) {
            $sanitary_values['showF12Message'] = (Boolean)$input['showF12Message'];
        }

        if ( isset( $input['showF12OpenMsg'] ) ) {
            $sanitary_values['showF12OpenMsg'] = (Boolean)$input['showF12OpenMsg'];
        }

        if ( isset( $input['showCopyMessage'] ) ) {
            $sanitary_values['showCopyMessage'] = (Boolean)$input['showCopyMessage'];
        }

        if ( isset( $input['showWelcomeMessage'] ) ) {
            $sanitary_values['showWelcomeMessage'] = (Boolean)$input['showWelcomeMessage'];
        }

        if ( isset( $input['waifuSize'] ) ) {
            $sanitary_values['waifuSize'] = $input['waifuSize'];
        }

        if ( isset( $input['waifuTipsSize'] ) ) {
            $sanitary_values['waifuTipsSize'] = $input['waifuTipsSize'];
        }

        if ( isset( $input['waifuFontSize'] ) ) {
            $sanitary_values['waifuFontSize'] = sanitize_text_field( $input['waifuFontSize'] );
        }

        if ( isset( $input['waifuToolFont'] ) ) {
            $sanitary_values['waifuToolFont'] = sanitize_text_field( $input['waifuToolFont'] );
        }

        if ( isset( $input['waifuToolLine'] ) ) {
            $sanitary_values['waifuToolLine'] = sanitize_text_field( $input['waifuToolLine'] );
        }

        if ( isset( $input['waifuToolTop'] ) ) {
            $sanitary_values['waifuToolTop'] = sanitize_text_field( $input['waifuToolTop'] );
        }

        if ( isset( $input['waifuMinWidth'] ) ) {
            $sanitary_values['waifuMinWidth'] = sanitize_text_field( $input['waifuMinWidth'] );
        }

        if ( isset( $input['waifuEdgeSide'] ) ) {
            $sanitary_values['waifuEdgeSide'] = sanitize_text_field( $input['waifuEdgeSide'] );
        }

        if ( isset( $input['waifuDraggable'] ) ) {
            $sanitary_values['waifuDraggable'] = $input['waifuDraggable'];
        }

        if ( isset( $input['waifuDraggableRevert'] ) ) {
            $sanitary_values['waifuDraggableRevert'] = (Boolean)$input['waifuDraggableRevert'];
        }

        if ( isset( $input['homePageUrl'] ) ) {
            $sanitary_values['homePageUrl'] = sanitize_text_field( $input['homePageUrl'] );
        }

        if ( isset( $input['aboutPageUrl'] ) ) {
            $sanitary_values['aboutPageUrl'] = sanitize_text_field( $input['aboutPageUrl'] );
        }

        if ( isset( $input['screenshotCaptureName'] ) ) {
            $sanitary_values['screenshotCaptureName'] = sanitize_text_field( $input['screenshotCaptureName'] );
        }
        return $sanitary_values;
    }

}

?>