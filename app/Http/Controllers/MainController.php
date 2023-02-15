<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\product;

class MainController extends Controller
{
    public function home(){

        $categories = category :: all();
        return view('pages.home', compact('categories'));
    }

    public function productDelete(Product $product){

        $product -> categories() -> sync([]);
        $product -> delete();

        return redirect() -> route('home');
    }
}
