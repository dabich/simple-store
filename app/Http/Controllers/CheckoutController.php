<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Events\NotificationFailed;

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
        /** @var Order $order */
        $order = Order::create(
            $request->only([
                'name',
                'email',
                'address'
            ])
        );

        $products = array_map(
            function ($product) {
                return [
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity']
                ];
            },
            Cart::getData()['items']
        );

        $order->items()->createMany($products);

        $payResult = $order->pay($request->get('stripeToken'), Cart::getTotalPrice());

        session()->flash('order', $order);

        if ($payResult->status) {
            Cart::clear();

            $order->update(['payment_status' => Order::STATUS_PAID]);
            $order->notify(new InvoicePaid());

            session()->flash('payResult', $payResult);
            return redirect('success');
        } else {
            $order->update(['payment_status' => Order::STATUS_FAIL]);

            session()->flash('payResult', $payResult);
            return redirect('fail');
        }
    }

    /**
     * Success page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function success()
    {
        $order = session()->get('order');

        if (!$order) {
            return redirect('/');
        }

        return view('checkout.success', [
            'payResult' => session()->get('payResult'),
            'order' => $order
        ]);
    }

    /**
     * Fail page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function fail()
    {
        $order = session()->get('order');

        if (!$order) {
            return redirect('/');
        }

        return view('checkout.fail', [
            'payResult' => session()->get('payResult'),
            'order' => $order
        ]);
    }
}
