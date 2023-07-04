<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
use zymeli\TranslateManager\bundles\TranslateManagerAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

$this->registerCsrfMetaTags();
TranslateManagerAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php $this->beginBody() ?>

        <main class="main">
            <?php
            NavBar::begin([
                'brandLabel' => 'Lajax TranslateManager',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar fixed-top navbar-expand-md navbar-dark bg-dark'],
                'renderInnerContainer' => true,
                'innerContainerOptions' => ['class' => 'container-fluid px-3'],
                'collapseOptions' => ['class' => 'justify-content-end'],
            ]);
            $menuItems = [
                ['label' => Yii::t('language', 'Home'), 'url' => ['/']],
                ['label' => Yii::t('language', 'Language'), 'items' => [
                    ['label' => Yii::t('language', 'List of languages'), 'url' => ['/translatemanager/language/list']],
                    ['label' => Yii::t('language', 'Create'), 'url' => ['/translatemanager/language/create']],
                ]],
                ['label' => Yii::t('language', 'Scan'), 'url' => ['/translatemanager/language/scan']],
                ['label' => Yii::t('language', 'Optimize'), 'url' => ['/translatemanager/language/optimizer']],
                ['label' => Yii::t('language', 'Im-/Export'), 'items' => [
                    ['label' => Yii::t('language', 'Import'), 'url' => ['/translatemanager/language/import']],
                    ['label' => Yii::t('language', 'Export'), 'url' => ['/translatemanager/language/export']],
                ]],
            ];
            echo Nav::widget([
                'activateItems' => false,
                'options' => ['class' => 'navbar-nav nav-tabs ml-auto mr-n3'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container-fluid">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?php
                foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                } ?>
                <?= Html::tag('h1', Html::encode($this->title)) ?>
                <?= $content ?>
            </div>
        </main>

        <footer class="footer mt-auto py-3 text-muted">
            <div class="container-fluid">
                <p class="float-start">&copy; Lajax TranslateManager <?= date('Y') ?></p>
                <p class="float-end"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
