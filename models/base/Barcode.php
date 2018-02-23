<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "barcode".
 *
 * @property integer $id
 * @property string $barcode
 * @property string $status
 * @property integer $products_id
 * @property integer $invoice_id
 * @property integer $user_id
 *
 * @property \app\models\Invoice $invoice
 * @property \app\models\Products $products
 * @property \app\models\User $user
 * @property string $aliasModel
 */
abstract class Barcode extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barcode';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barcode', 'products_id'], 'required'],
            [['status'], 'number'],
            [['products_id', 'invoice_id', 'user_id'], 'integer'],
            [['barcode'], 'string', 'max' => 45],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Products::className(), 'targetAttribute' => ['products_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barcode' => 'Barcode',
            'status' => 'Status',
            'products_id' => 'Products ID',
            'invoice_id' => 'Invoice ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(\app\models\Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\Products::className(), ['id' => 'products_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }




}
