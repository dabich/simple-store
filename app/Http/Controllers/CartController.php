<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

    public function remove(Request $request, $id)
    {
        Cart::remove($id);
    }

    public function clear(Request $request)
    {
        Cart::clear();
    }


}
