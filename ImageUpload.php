<?php

namespace app\models;
use Yii;
use yii\web\UploadedFile;
use yii\base\Model;

class ImageUpload extends Model {

	public $image;


	public function rules(){

		return [
			[['image'],'required'],
			[['image'], 'file', 'extensions' => 'png,jpg' ]
		];
	}

	public function uploadFile($file , $currentImage){


		$this->image = $file;

		if($this->validate())
		{
			
			$this->deleteCurImage($currentImage);
			$filename=strtolower(uniqid($file->baseName).'.'. $file->extension );

			$file->saveAs('images/'. $filename);

			return $filename;
		}
	}

	public function deleteCurImage($currentImage){

		if(file_exists('images/'.$currentImage)){

				unlink('images/'.$currentImage);

				}
	}
}