<?php

namespace zymeli\TranslateManager\controllers\actions;

/**
 * Displays a single Language model.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.3
 */
class ViewAction extends \yii\base\Action
{
    /**
     * Displays a single Language model.
     *
     * @param int|string $_id
     * @param int|string $id
     *
     * @return mixed
     */
    public function run($_id = null, $id = null)
    {
        $id = ($id ?: $_id);
        return $this->controller->render('view', [
            'model' => $this->controller->findModel($id),
        ]);
    }
}
