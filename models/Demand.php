<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "demand".
 *
 * @property integer $id
 * @property string $date
 * @property integer $aid_id
 * @property integer $amount
 *
 * @property Aid $aid
 */
class Demand extends \yii\db\ActiveRecord
{
    public $new_aid;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'aid_id', 'amount'], 'required'],
            [['date'], 'safe'],
            [['aid_id', 'amount'], 'integer'],
            [['new_aid'],'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Tanggal',
            'aid_id' => 'Bantuan',
            'amount' => 'Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAid()
    {
        return $this->hasOne(Aid::className(), ['id' => 'aid_id']);
    }

}
