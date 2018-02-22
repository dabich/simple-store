<?php

namespace App\Models;

class Cart
{
    /**
     * Get cart data
     * @return array
     */
    public static function getData()
    {
        return self::prepareCartData(session('cart'));
    }

    /**
     * Add item to cart
     * @param $product
     */
    public static function add($product)
    {
        session()->push('cart', $product);
    }

    /**
     * Remove item from cart
     * @param $id
     */
    public static function remove($id)
    {
        session()->remove('cart');
    }

    /**
     * Clear cart
     */
    public static function clear()
    {
        session()->forget('cart');
    }

    /**
     * Get total price
     * @return mixed
     */
    public static function getTotalPrice()
    {
        $cart = self::getData();

        return $cart['totalPrice'] ?? 0;
    }

    /**
     * @param array $products
     * @return array
     */
    protected static function prepareCartData($products)
    {
        $items = [];
        $totalPrice = 0;
        $totalCount = 0;

        if ($products) {
            foreach ($products as $product) {
                $totalPrice += $product['price'];
                $totalCount += 1;
                $product['quantity'] = 1;

                if (isset($items[$product['id']])) {
                    $items[$product['id']]['quantity'] += 1;
                } else {
                    $items[$product['id']] = $product;
                }
            }
        }

        return [
            'items' => $items,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
        ];
    }

    /**
     * @return array
     */
    public static function getProductIds()
    {
        $products = collect(session('cart'));

        return $products->pluck('id') ?? [];
    }
}