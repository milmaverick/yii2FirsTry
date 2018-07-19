<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Comments';

?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'user',
            'email:email',
            'text:ntext',
            // 'prod_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
