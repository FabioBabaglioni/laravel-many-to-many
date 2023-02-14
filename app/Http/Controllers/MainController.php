<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class MainController extends Controller
{
    public function home(){

        $categories = category :: all();
        return view('pages.home', compact('categories'));
    }
}
