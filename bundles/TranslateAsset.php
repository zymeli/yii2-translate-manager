<?php

namespace zymeli\TranslateManager\bundles;

use yii\web\AssetBundle;

/**
 * Contains css files necessary for modify translations on the backend.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
class TranslateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@zymeli/TranslateManager/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'stylesheets/helpers.css',
        'stylesheets/translate.css',
    ];
}
