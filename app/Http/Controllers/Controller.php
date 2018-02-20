<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Cart
     */
    public $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            view()->share('cart', Cart::getData());

            return $next($request);
        });
    }
}
