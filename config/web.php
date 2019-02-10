<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'pl',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CPbtCDZI1Bdz3ubBlaaZ3Sw98y-bBx8l',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
//            'loginUrl' => ['/', 'autologin' => true]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'baseUrl' => Yii::getAlias('index.php'),

        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
            'dynaGridOptions' => [
//                'storage' => 'db',
                'toggleButtonGrid' => [
                    'icon' => '',
                    'label' => '<i class="fas fa-wrench fa-fw"></i>',
                    'class' => 'btn btn-primary',
                ],
                 'toggleButtonFilter' => [
                    'icon' => '',
                    'label' => '<i class="fas fa-filter"></i>',
                    'class' => 'btn btn-default',
                ],
                'toggleButtonSort' => [
                    'icon' => '',
                    'label' => '<i class="fas fa-sort"></i>',
                    'class' => 'btn btn-default',
                ],
                'gridOptions' => [
                    'resizableColumns' => false,
                    'toggleDataOptions' => [
                        'all' => [
                            'icon' => '',
                            'label' => '<i class="fa fa-arrows-alt"></i>',
                            'class' => 'btn btn-default',
                            //'title' => Yii::t('appGlowne', 'Pokaż wszystkie rekordy'),
                            'showConfirmAlert' => false,
                        ],
                        'page' => [
                            'icon' => '',
                            'label' => '<i class="fa fa-compress"></i>',
                            'class' => 'btn btn-default',
                            //'title' => Yii::t('appGlowne', 'Pokaż stronę'),
                        ],
                    ],
                    'export' => [
                        'icon' => '',
                        'label' => '<i class="fas fa-download"></i>',
                        'showConfirmAlert' => false,
                        'target' => '_self',
                        'header' => '',
                    ],
                    'exportConfig' => [
                        'html' => [
                            'icon' => '',
                            'label' => '<i class="fab fa-html5" style="color: #1c94c4"></i> ' . Yii::t('appexport', 'HTML'),
                            'filename' => Yii::t('appexport', 'Export') . ' ' . date('d-m-Y G:i:s'),
                        ],
                        'csv' => [
                            'icon' => '',
                            'label' => '<i class="fas fa-file-csv"></i> ' . Yii::t('appexport', 'CSV'),
                            'filename' => Yii::t('appexport', 'Export') . ' ' . date('d-m-Y G:i:s'),
                        ],
                        'txt' => [
                            'icon' => '',
                            'label' => '<i class="fas fa-font"></i> ' . Yii::t('appexport', 'Text'),
                            'filename' => Yii::t('appexport', 'Export') . ' ' . date('d-m-Y G:i:s'),
                        ],
                        'xls' => [
                            'icon' => '',
                            'label' => '<i class="far fa-file-excel" style="color: #1c7430"></i> ' . Yii::t('appexport', 'Excel'),
                            'filename' => Yii::t('appexport', 'Export') . ' ' . date('d-m-Y G:i:s'),
                        ],
                        'pdf' => [
                            'icon' => '',
                            'label' => '<i class="far fa-file-pdf" style="color: orange"></i> ' . Yii::t('appexport', 'PDF'),
                            'filename' => Yii::t('appexport', 'Export') . ' ' . date('d-m-Y G:i:s'),
                            'config' => [
                                'options' => [
                                    'title' => Yii::t('appexport', 'Export') . ' ' . date('d-m-Y G:i:s'),
                                    'subject' => Yii::t('appGlowne', 'Export'),
                                    'keywords' => null
                                ],
                                'methods' => [
                                    'SetHeader' => ['NeoGage &reg; ||' . ' ' . date("d-m-Y")],
                                    'SetFooter' => ['&nbsp;{PAGENO}'],
                                ]
                            ]
                        ],
                    ]
                ]
            ]
        ],
    ],
    'container' => [
        'definitions' => [
            yii\widgets\LinkPager::class => [
                'firstPageLabel' => '<<',
                'lastPageLabel' => '>>',
                'nextPageLabel' => false,
                'prevPageLabel' => false,
                'activePageCssClass' => 'active-page',
                'pageCssClass' => 'pagination',
                'maxButtonCount' => 10
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
