<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $orders = auth()
            ->user()
            ->orders()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('home', [
            'orders' => $orders,
            'user' => auth()->user()
        ]);
    }
}
