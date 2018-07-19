<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Products';

?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions'=>['class'=>'table-striped table-bordered table-condensed' ],
        'options'=>['style' => 'white-space:nowrap;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format'=>'html',
                'label' => 'Image',
                'value' => function ($data){
                    return Html::img($data->getImage(), ['width'=>250]) ;
                }
            ],
            'name',
            [
                'format'=>'html',
                'label' => 'Price',
                'value' => function ($data){
                    return number_format((float)$data->price , 2, '.', '');
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
<br>
</div>
