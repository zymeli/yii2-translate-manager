<?php

namespace zymeli\TranslateManager\bundles;

use yii\web\AssetBundle;

/**
 * Contains javascript files necessary for message scan on the backend.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.4
 */
class ScanPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@zymeli/TranslateManager/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'javascripts/scan.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        \yii\web\JqueryAsset::class,
        TranslationPluginAsset::class,
    ];
}
