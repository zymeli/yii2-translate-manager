<?php

namespace zymeli\TranslateManager\bundles;

use yii\web\AssetBundle;

/**
 * Contains javascript files necessary for modify translations on the live site (frontend translation).
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.2
 */
class FrontendTranslationPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@zymeli/TranslateManager/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'javascripts/helpers.js',
        'javascripts/frontend-translation.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        \yii\web\JqueryAsset::class,
        \yii\jui\JuiAsset::class,
        TranslationPluginAsset::class,
    ];
}
