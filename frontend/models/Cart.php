<?php

namespace frontend\models;

use Yii;
use yii\base\Component;

class Cart extends Component
{
    private $_cart;

    public function init()
    {
        parent::init();

        $this->_cart = Yii::$app->session->get('cart', []);
    }

    public function add($product, $quantity = 1)
    {
        $productId = $product->id;

        if (isset($this->_cart[$productId])) {
            $this->_cart[$productId]['quantity'] += $quantity;
        } else {
            $this->_cart[$productId] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        Yii::$app->session->set('cart', $this->_cart);
    }

    public function remove($productId)
    {
        unset($this->_cart[$productId]);

        Yii::$app->session->set('cart', $this->_cart);
    }

    public function removeAll()
    {
        $this->_cart = [];

        Yii::$app->session->set('cart', $this->_cart);
    }

    public function getItems()
    {
        $items = [];

        foreach ($this->_cart as $productId => $item) {
            $product = $item['product'];
            $quantity = $item['quantity'];
            $totalPrice = $product->price * $quantity;

            $items[] = [
                'id' => $productId,
                'name' => $product->name,
                'image' => $product->image,
                'quantity' => $quantity,
                'price' => $product->price,
                'total_price' => $totalPrice,
            ];
        }

        return $items;
    }

    public function getCount()
    {
        $count = 0;

        foreach ($this->_cart as $item) {
            $count += $item['quantity'];
        }

        return $count;
    }

    public function getCost()
    {
        $cost = 0;

        foreach ($this->_cart as $item) {
            $product = $item['product'];
            $quantity = $item['quantity'];
            $cost += $product->price * $quantity;
        }

        return $cost;
    }
}