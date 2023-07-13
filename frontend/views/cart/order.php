<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 3:32 PM
 *
 * @var $orders \common\models\Order[]
 */

$this->title = 'My Orders';
?>

<div class="orders-index">
    <h1><?= $this->title ?></h1>
    <?php if (!empty($orders)): ?>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order->id ?></td>
                    <td><?= Yii::$app->formatter->asCurrency($order->total_price) ?></td>
                    <td><?= $order->getStatusText() ?></td>
                    <td><?= Yii::$app->formatter->asDatetime($order->created_at) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
</div>