<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Get cart data
     * @return array
     */
    public function view()
    {
        return Cart::getData();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function add(Request $request)
    {
        Cart::add($request->all());

        return Cart::getData();
    }

    /**
     * Remove cart item from session
     * @param Request $request
     * @param $id
     */
    public function remove(Request $request, $id)
    {
        Cart::remove($id);
    }

    /**
     * Clear cart session
     * @param Request $request
     */
    public function clear(Request $request)
    {
        Cart::clear();
    }
}
