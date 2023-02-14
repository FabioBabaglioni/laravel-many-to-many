<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\models\Category;
use App\models\Product;
use App\models\Typology;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product :: factory() -> count(100) -> make() -> each(function($p){
            $typology = Typology :: inRandomOrder() -> first();

            $p -> Typology() -> associate($typology);

            $p -> save();

            $categories = Category :: inRandomOrder() -> limit(rand(1, 5)) -> get();
            $p -> categories() -> attach($categories);
        });

    }
}
