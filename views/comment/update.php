<?php
use yii\helpers\Html;

$this->title = 'Update Comment: ' . $model->id;

?>
<div class="comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
