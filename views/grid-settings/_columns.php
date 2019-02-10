<?php

use yii\helpers\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'user_id',
        'value' => 'user.username'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'settings',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'created_at',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'template' => '{view} {delete}',
        'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<i class="far fa-eye"></i>', Url::to(['grid-settings/apply-filter', 'id' => $model->id]), ['title' => 'Zastosuj filtr']);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="fas fa-trash-alt" style="color:#222d32;"></span>', $url, ['data-pjax' => 0, 'title' => 'Usuń',
                    'data' => [
                        'data-confirm' => false, 'data-method' => false, // for overide yii data api
                        'method' => 'post',
                    ]]);
            },
        ],
    ],
];  