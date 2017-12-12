<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\Productview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            error_log("failed");
            return redirect('products/create')
                ->withErrors($validator)
                ->withInput();
        }else{
            error_log("okay");
            $product = new Product();
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->created_by = Auth::user()->id;
            $product->save();

            error_log("yes  ");
            error_log($product->name);
            $message = 'Successfully created product!';
            return redirect('Products')->with('message', $message);
        }
    }

    public function show($sku){
        $product = Product::find($sku);

        $views = Productview::where('product_id', $sku)->count();

        $bids = Bid::where('product_id', $sku)->latest()->get();
        error_log($bids);

        return view('products.show')->with(['product' => $product, 'views' => $views, 'bids' => $bids]);
    }

    public function edit($sku){
        error_log("wanda" . $sku);
        $product = Product::find($sku);
        return view('products.edit')->with('product', $product);
    }

    public function update($id){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('products/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            $product = Product::find($id);
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->updated_by = Auth::user()->id;
            $product->save();

            $message = 'Successfully updated product!';
            return redirect('Products')->with('message', $message);
        }
    }

    public function destroy($id){
        error_log("You there!!!");
        $product = Product::find($id);
        $product->deleted_by = Auth::user()->id;
        $product->save();

        $product = Product::find($id);
        $product->delete();

        $message = 'Successfully deleted the product!';
        return redirect('Products')->with('message', $message);
    }
}
