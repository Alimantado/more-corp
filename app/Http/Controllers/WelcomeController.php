<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Notifications\BidNotification;
use App\Product;
use App\Productview;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        error_log("je wanda");
        $products = Product::all();
        return view('welcome')->with('products', $products);
    }

    public function show(Request $request, $sku)
    {
        $productView = new Productview();
        $productView->product_id = $sku;
        $productView->ip_address = $request->ip();
        $productView->save();

        $product = Product::find($sku);
        error_log("dd".$product->bid()->get());
        return view('show')->with('product', $product);
    }

    public function bid(Request $request){
        $product = Product::find(Input::get('sku'));
        $latestBid = ($product->bid()->count())?$product->bid()->latest()->first()->amount:0;
        $min = ($latestBid>0)?$latestBid:$product->price;


        $rules = array(
            'sku' => 'required',
            'email' => 'required',
            'price' => 'required|numeric|min:'.$min
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            error_log("failed");
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }else{
            error_log("okay");
            $bid = new Bid();
            $bid->product_id = Input::get('sku');
            $bid->amount = Input::get('price');
            $bid->email= Input::get('email');
            $bid->save();
            
            //Notification::send($bid, new BidNotification());
            $bid->notify(new BidNotification($bid));

            $message = 'Successfully bid product!';

            $products = Product::all();
            return redirect('/')->with(['products'=>$products, 'message'=> $message]);
        }
    }
}
