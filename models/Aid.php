<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aid".
 *
 * @property integer $id
 * @property string $name
 * @property integer $stock
 */
class Aid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['name', 'stock', 'category_id', 'unit'], 'required'],
           [['stock', 'category_id'], 'integer'],
            [['name', 'unit'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Nama',
            'stock' => 'Stok',
            'category_id' => 'Kategori',
            'unit' => 'Satuan'
        ];
    }

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getDemands() 
   { 
       return $this->hasMany(Demand::className(), ['aid_id' => 'id']); 
   } 

   /**
    * @return \yii\db\ActiveQuery
    */
  public function getCategory()
  {
      return $this->hasOne(Category::className(), ['id' => 'category_id']);
  }

}
