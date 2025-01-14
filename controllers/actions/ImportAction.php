<?php

namespace zymeli\TranslateManager\controllers\actions;

use zymeli\TranslateManager\models\Language;
use zymeli\TranslateManager\Module;
use zymeli\TranslateManager\services\Generator;
use Yii;
use yii\web\UploadedFile;
use zymeli\TranslateManager\models\ImportForm;

/**
 * Class for exporting translations.
 */
class ImportAction extends \yii\base\Action
{
    /**
     * Show import form and import the uploaded file if posted
     *
     * @return string
     *
     * @throws \Exception
     */
    public function run()
    {
        $model = new ImportForm();

        if (Yii::$app->request->isPost) {
            $model->importFile = UploadedFile::getInstance($model, 'importFile');

            if ($model->validate()) {
                try {
                    $result = $model->import();

                    $message = Yii::t('language', 'Successfully imported {fileName}', ['fileName' => $model->importFile->name]);
                    $message .= "<br/>\n";
                    foreach ($result as $type => $typeResult) {
                        $message .= "<br/>\n" . Yii::t('language', '{type}: {new} new, {updated} updated', [
                            'type' => $type,
                            'new' => $typeResult['new'],
                            'updated' => $typeResult['updated'],
                        ]);
                    }

                    $languageIds = Language::find()
                        ->select('language_id')
                        ->where(['status' => Language::STATUS_ACTIVE])
                        ->column();

                    foreach ($languageIds as $languageId) {
                        /** @var Module $module */
                        $module = $this->controller->module;
                        $generator = new Generator($module, $languageId);
                        $generator->run();
                    }

                    Yii::$app->getSession()->setFlash('success', $message);
                } catch (\Exception $e) {
                    if (YII_DEBUG) {
                        throw $e;
                    } else {
                        Yii::$app->getSession()->setFlash('danger', str_replace("\n", "<br/>\n", $e->getMessage()));
                    }
                }
            }
        }

        return $this->controller->render('import', [
            'model' => $model,
        ]);
    }
}
