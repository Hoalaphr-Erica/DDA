<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Xác nhận đơn hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-confirmation">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <h2>Thông tin đơn hàng</h2>

    <?= DetailView::widget([
        'model' => $order,
        'attributes' => [
            'id',
            'total_price:currency',
            'statusLabel',
            'created_at:datetime',
            'createdBy.username',
        ],
    ]) ?>

    <h2>Thông tin địa chỉ</h2>

    <?= DetailView::widget([
        'model' => $order->orderAddress,
        'attributes' => [
            'address',
            'city',
            'state',
            'country',
            'zipcode',
        ],
    ]) ?>

    <h2>Thông tin sản phẩm</h2>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $orderItems,
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product.name',
            'quantity',
            'unit_price:currency',
            'total_price:currency',
        ],
    ]) ?>

    <h3>Tổng tiền: <?= Yii::$app->formatter->asCurrency($order->total_price) ?></h3>
</div>