<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-12">
    <div class="row">
        <div class="col-12 col-md-6 my-auto" style="font-size:14px;">{summary}</div>
        <div class="col-12 col-md-auto ml-sm-auto">
            <?= Html::a('Zapisz filtr', FALSE, ['value' => Url::to(['grid-save', Yii::$app->request->get('RealizacjaSearch')]), 'class' => 'loadAjaxContent btn btn-success', 'style' => 'color: white', 'icon' => '<i class="far fa-save"></i>', 'modaltitle' => 'Zapisz filtr']); ?>
            {toggleData}
            {export}
        </div>
    </div>
    {items}
    {panelAfter}
    {pager}
</div>