<?php

namespace app\controllers;

use Yii;
use app\models\ImageUpload;
use app\models\Product;
use app\models\Comment;
use app\models\Category;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProductController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $comments=Comment::find()->where(['prod_id' => $id])->all();
        $model=$this->findModel($id);
        $category= $this->findCategory($model->category_id);
        return $this->render('view', [
            'model' => $model,
            'comments' => $comments,
            'category' => $category
        ]);
    }

 
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $categories = $this->findCategory();
            return $this->render('create', [
                'model' => $model,
                'categories'=> $categories,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $categories = $this->findCategory();
            return $this->render('update', [
                'model' => $model,
                'categories'=> $categories,
            ]);
        }
    }

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSetImage($id){

        $model = new ImageUpload;

        if(Yii::$app->request->isPost)
            {
                $product= $this->findModel($id);

                $file=  UploadedFile::getInstance($model, 'image');
  
                if($product->saveImage($model->uploadFile($file,$product->image))){
                    return $this->redirect(['view', 'id' => $product->id]);
                }
            }

        return $this->render('image', ['model'=>$model]);
    }

    protected function findCategory($id=0){
        if($id==0) {
            $model = Category::find()->all();
             return $model;
        }
        if ($id!== 0 && ($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
