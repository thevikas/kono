<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app ()->name . ' - ' . __('Data Report');
$this->breadcrumbs = array (
        __('Data Report') 
);
?>

<h1><?=__('Data Report')?></h1>

<?php

$dataProvider = new CArrayDataProvider ( $muni, array (
        'keyField' => 0,
        'sort' => array (
                'attributes' => array (
                        0,
                        1,
                        2 
                ) 
        ),
        'pagination' => array (
                'pageSize' => 50 
        ) 
) );

$this->widget ( 'zii.widgets.grid.CGridView', 
        [ 
                'dataProvider' => $dataProvider,
                'columns' => [ 
                        [ 
                                'header' => __('City'),
                                'value' => function ($data)
                                {
                                    return $data [0];
                                } 
                        ],
                        [ 
                                'header' => __('Polygons'),
                                'value' => function ($data)
                                {
                                    return $data [1];
                                } 
                        ],
                        [ 
                                'header' => __('Councillors'),
                                'value' => function ($data)
                                {
                                    return $data [2];
                                } 
                        ] 
                ] 
        ] );

$dataProvider = new CArrayDataProvider ( $amly, array (
        'keyField' => 0,
        'sort' => array (
                'attributes' => array (
                        0,
                        1,
                        2,3,4 
                ) 
        ),
        'pagination' => array (
                'pageSize' => 50 
        ) 
) );

$this->widget ( 'zii.widgets.grid.CGridView', 
        [ 
                'dataProvider' => $dataProvider,
                'columns' => [ 
                        [ 
                                'header' => __('State'),
                                'type' => 'raw',                                 
                                'value' => function ($data)
                                {
                                    return CHtml::link($data [0],['state/view','id' => $data[7]]);
                                } 
                        ],
                        [ 
                                'header' => __('Polygons'),
                                'value' => function ($data)
                                {
                                    return $data [1];
                                } 
                        ],
                        [ 
                                'header' => __('MLAs'),
                                'value' => function ($data)
                                {
                                    return $data [2];
                                } 
                        ],
                        [
                                'header' => __('Phones'),
                                'value' => function ($data)
                                {
                                    return $data [3];
                        }
                        ],
                        [
                                'header' => __('Emails'),
                                'value' => function ($data)
                                {
                                    return $data [4];
                        }
                        ],
                        [
                                'header' => __('Address'),
                                'value' => function ($data)
                                {
                                    return $data [5];
                        }
                        ],
                        [
                                'header' => __('Picture'),
                                'value' => function ($data)
                                {
                                    return $data [6];
                        }
                        ],
                        ] 
        ] );
?>