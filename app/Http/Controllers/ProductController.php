<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //


    public function upload(Request $request){

    }

    public function show(){
        $products = product::all();
        return view('show')->with(['products' => $products]);
    }
}
