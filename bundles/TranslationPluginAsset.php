<?php

namespace zymeli\TranslateManager\bundles;

use yii\web\AssetBundle;

/**
 * Contains javascript files necessary for translating javascript messages on the client side (`lajax.t()` calls).
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
class TranslationPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@zymeli/TranslateManager/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'javascripts/md5.js',
        'javascripts/lajax.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        LanguageItemPluginAsset::class,
    ];
}
