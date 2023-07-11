<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\OrderAddress]].
 *
 * @see \common\models\OrderAddress
 */
class OrderAdressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\OrderAddress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\OrderAddress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
