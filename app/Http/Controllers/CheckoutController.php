<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkoutView()
    {
        return view('checkout.checkout');
    }

    /**
     * @param CheckoutRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkout(CheckoutRequest $request)
    {
        $order = Order::create(
            $request->only([
                'user_name',
                'user_email',
                'address'
            ])
        );

        Cart::clear();

        return redirect('success');
    }

    public function success()
    {
        return view('checkout.success');
    }

    public function fail()
    {
        return view('checkout.fail');
    }
}
