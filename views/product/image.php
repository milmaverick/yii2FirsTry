<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton( 'Submit', ['class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
