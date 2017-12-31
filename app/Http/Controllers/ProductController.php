<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('index', ['products' => $products]);
    }

    public function store()
    {
    	$product = new Product;
    	$product->name = request('name');
    	$product->expiration_date = date('Y-m-d', strtotime('+1 year'));
    	$product->save();

    	return redirect('/');
    	
    }

    public function fetch() 
    {
    	$products = Product::all();



    	return $products->toJson();
    }
}
