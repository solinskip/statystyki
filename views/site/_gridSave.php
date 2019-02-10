<?php

use kartik\sortinput\SortableInput;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GridSettings */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="grid-settings-form">
    <?php $form = ActiveForm::begin(); ?>

    <?php if (empty(Yii::$app->request->get())) : ?>
        <div class="text-danger text-center">
            <h6>UWAGA! Żadne dane nie zostały wyfiltrowane</h6>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'columnsOn')->widget(SortableInput::classname(), [
                'name' => 'kv-conn-1',
                'items' => $model->getColumnItems(),
                'hideInput' => true,
                'sortableOptions' => [
                    'connected' => true,
                ],
                'options' => ['class' => 'form-control', 'readonly' => true]
            ]); ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'columnsOff')->widget(SortableInput::classname(), [
                'name' => 'kv-conn-2',
                'items' => [],
                'hideInput' => true,
                'sortableOptions' => [
                    'itemOptions' => ['class' => 'alert alert-warning'],
                    'connected' => true,
                ],
                'options' => ['class' => 'form-control', 'readonly' => true]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Zapisz' : 'Aktualizuj', ['class' => 'btn float-right px-3 modal-sub']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>