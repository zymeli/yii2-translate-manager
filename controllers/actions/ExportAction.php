<?php

namespace zymeli\TranslateManager\controllers\actions;

use Yii;
use yii\web\JsonResponseFormatter;
use yii\web\Response;
use yii\web\XmlResponseFormatter;
use zymeli\TranslateManager\Module;
use zymeli\TranslateManager\models\ExportForm;

/**
 * Class for exporting translations.
 */
class ExportAction extends \yii\base\Action
{
    /**
     * Show export form or generate export file on post
     *
     * @return mixed
     */
    public function run()
    {
        /** @var Module $module */
        $module = $this->controller->module;

        $model = new ExportForm([
            'format' => $module->defaultExportFormat,
        ]);

        if ($model->load(Yii::$app->request->post())) {
            $fileName = Yii::t('language', 'translations') . '.' . $model->format;

            Yii::$app->response->format = $model->format;

            Yii::$app->response->formatters = [
                Response::FORMAT_XML => [
                    'class' => XmlResponseFormatter::className(),
                    'rootTag' => 'translations',
                ],
                Response::FORMAT_JSON => [
                    'class' => JsonResponseFormatter::className(),
                ],
            ];

            Yii::$app->response->setDownloadHeaders($fileName);

            return $model->getExportData();
        } else {
            if (empty($model->languages)) {
                $model->exportLanguages = $model->getDefaultExportLanguages($module->defaultExportStatus);
            }

            return $this->controller->render('export', [
                'model' => $model,
            ]);
        }
    }
}
