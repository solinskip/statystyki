<?php

use kartik\dynagrid\DynaGrid;

$this->title = 'Strona główna';
?>
<?php if (Yii::$app->user->isGuest) : ?>
    <div class="display-4 text-center mt-3">Aby zobaczyć zawartość strony <span
                class="badge badge-info">zaloguj sie.</span></div>
<?php else: ?>
    <div class="site-index">
        <div class="col-12">
        <?= DynaGrid::widget([
            'id' => 'crud-datatable',
            'columns' => require(__DIR__ . '/_columns.php'),
            'options' => ['id' => 'site-grid'],
            'gridOptions' => [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax' => false,
                'striped' => true,
                'condensed' => true,
                'bordered' => false,
                'responsive' => true,
                'resizableColumns' => false,
                'toggleDataContainer' => ['class' => 'btn-group'],
                'toggleDataOptions' => [
                    'all' => [
                        'icon' => ' fas fa-expand-arrows-alt',
                        'label' => '',
                        'class' => 'btn btn-lg',
                        'title' => 'Wyświetl wszystkie',
                    ],
                    'page' => [
                        'icon' => 'fas fa-file',
                        'label' => '',
                        'class' => 'btn btn-lg',
                        'title' => 'Wyświetl stronę',
                    ],
                ],
                'panelTemplate' => $this->render('_panelTemplate'),
            ],
        ]); ?>
        </div>
    </div>
<?php endif; ?>
