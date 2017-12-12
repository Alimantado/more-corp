<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $bids = Bid::all();
        $users= User::all();

        return view('home')->with(["pCount" => $products->count(), "bCount" => $bids->count(), "cUser" => $users->count()]);

    }
}
