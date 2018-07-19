<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
	
		public function rules(){
            return [
                [['date','user','email','text','prod_id'],'required', 'message' => 'Не заполнено поле !'],
                ['email','email'], 
            ];

		}
	
}