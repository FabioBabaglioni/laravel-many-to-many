<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\product;
use App\Models\typology;

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

    public function productCreate(){

        $typologies = typology :: all();
        $categories = category :: all();

        return view('pages.productCreate', compact('typologies', 'categories'));
    }

    public function productStore(Request $request){
        // dd($request -> all());

        $data = $request -> validate([
            'code' => 'required|string|max:5',
            'name' => 'required|string|max:32',
            'description' => 'required|string',
            'price' => 'required|integer|min:0|max:1000000',
            'weight' => 'required|integer|min:0|max:100000',
            'typology_id' => 'required|integer',
            'categories' => 'required|array',
        ]);

        $code = rand(10000, 55555);
        $data['code'] = $code;

        $product = product :: make($data);
        $typology = typology :: find($data['typology_id']);

        $product -> typology() -> associate($typology);
        $product -> save();
        
        $categories = category :: find($data['categories']);
        $product -> categories() -> attach($categories);

        return redirect() -> route('home');

    }
}
