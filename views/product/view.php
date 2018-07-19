<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;

?>

<img src="<?= $model->getImage() ?>" alt="tut kartinka" style="width:450px;">
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
     <div class= 'ViewPro'>
         <span> Name : <?= $model->name ?>  </span>
         <span style="float: right; font-weight:bold"> Price : <?= $model->price ?> $ </span>
         <br>
         <p>
             Description : <?= $model->description ?> 
         </p>
          Category : <?= $category->name?>
     </div>
</div>
<hr>
<div class="addComment"> 

    <div class="form-group">
        <?= Html::a('Add Comment', ['comment/create', 'prod_id'=> $model->id], [
        'class' => 'btn btn-success',
        'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </div>



    <?php foreach ($comments as $comment): ?>
        <div class = "comments"  >
        User: <?= $comment->user ?> <span style="float: right;"><?= $comment->date ?> </span><br>
        <span class="textCom" ><?=$comment->text ?> </span>
        <?= Html::a('Update', ['comment/update', 'id' => $comment->id], [
            'class' => 'btn btn-primary',
            'data' => [
                    'method' => 'post',
                ],
            ]) ?>
        <?= Html::a('Delete', ['comment/delete', 'id' => $comment->id,'prod_id'=> $comment->prod_id], [
            'class' => 'btn btn-danger',
            'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
</div>
<?php endforeach; ?>