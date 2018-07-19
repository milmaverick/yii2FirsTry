<?php
use yii\helpers\Html;

$this->title = 'Update Product: ' . $model->name;

?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories'=> $categories,
    ]) ?>

</div>
