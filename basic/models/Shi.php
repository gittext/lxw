<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_pwd
 */
class Shi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['time'],'datetime']
        ];
    }
}
