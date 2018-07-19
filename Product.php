<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
	
		public function rules(){
            return [
                [['name','description','price','category_id'],'required' ],
                [ ['price'], 'double'],
            ];

		}

		public function saveImage($filename){
			$this->image= $filename;
			return $this->save(false);

		}

		public function getImage(){
			if ($this->image)
			{
				return 'images/'.$this->image;
			}

			return 'images/noimage.png';
		}

		public function deleteImage(){

			$imageUpldModel = new ImageUpload();
			$imageUpldModel->deleteCurImage($this->image);
		}

		public function beforeDelete(){
			$this->deleteImage();
			return parent::beforeDelete();
		}
	

}
