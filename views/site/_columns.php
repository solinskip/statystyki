<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwa_projektu',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'liczba_godzin',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'start_kursu',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'koniec_kursu',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'opis',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'imie_prowadzacego',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaProwadzacy); $i++) {
                $result .= $model->realizacjaProwadzacy[$i]->prowadzacy['imie_prowadzacego'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwisko_prowadzacego',
        'format' => 'raw',
        'value' => function ($model) {
            $resutl = '';
            for ($i = 0; $i < count($model->realizacjaProwadzacy); $i++) {
                $resutl .= $model->realizacjaProwadzacy[$i]->prowadzacy['nazwisko_prowadzacego'] . '<br>';
            }

            return $resutl;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'stanowisko_prowadzacego',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaProwadzacy); $i++) {
                $result .= $model->realizacjaProwadzacy[$i]->prowadzacy['stanowisko'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'adres_email_prowadzacego',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaProwadzacy); $i++) {
                $result .= $model->realizacjaProwadzacy[$i]->prowadzacy['adres_email'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwa_platformy',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaPlatforma); $i++) {
                $result .= $model->realizacjaPlatforma[$i]->platformy['nazwa_platformy'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwa_zajec_rodzaj',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->rodzajZajecRealizacja); $i++) {
                $result .= $model->rodzajZajecRealizacja[$i]->rodzajZajec['nazwa_zajec'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'liczba_godzin_rodzaj',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->rodzajZajecRealizacja); $i++) {
                $result .= $model->rodzajZajecRealizacja[$i]->rodzajZajec['liczba_godzin'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'rodzaj_e_materialy',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaEMaterialy); $i++) {
                $result .= $model->realizacjaEMaterialy[$i]->eMaterialu['rodzaj'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwa_e_materialy',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaEMaterialy); $i++) {
                $result .= $model->realizacjaEMaterialy[$i]->eMaterialu['nazwa'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'dziedzina_e_materialy',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaEMaterialy); $i++) {
                $result .= $model->realizacjaEMaterialy[$i]->eMaterialu['dziedzina'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'opis_e_materialy',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaEMaterialy); $i++) {
                $result .= $model->realizacjaEMaterialy[$i]->eMaterialu['opis'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwa_kierunku',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaKierunek); $i++) {
                $result .= $model->realizacjaKierunek[$i]->kierunek['nazwa_kierunku'] . '<br>';
            }

            return $result;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nazwa_wydzialu',
        'format' => 'raw',
        'value' => function ($model) {
            $result = '';
            for ($i = 0; $i < count($model->realizacjaKierunek); $i++) {
                $result .= $model->realizacjaKierunek[$i]->kierunek->wydzial['nazwa_wydzialu'] . '<br>';
            }

            return $result;
        }
    ],
];


