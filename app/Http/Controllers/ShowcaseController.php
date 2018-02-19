<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShowcaseController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('showcase', [
            'products' => Product::paginate(12)
        ]);
    }
}
