<?php

use kartik\dynagrid\DynaGrid;

$this->title = '';
?>
<div class="site-index">
    <?= DynaGrid::widget([
        'id' => 'crud-datatable',
        'columns' => require(__DIR__.'/_columns.php'),
        'options' => ['id' => 'transactions-grid'],
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
