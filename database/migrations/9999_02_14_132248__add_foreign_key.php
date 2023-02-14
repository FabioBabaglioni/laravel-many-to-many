<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // relazione uno a molti tra products e typologies
        Schema::table('products', function (Blueprint $table) {
            $table -> foreignId('typology_id')
                   -> constrained();
        });

        Schema::table('category_product', function (Blueprint $table) {
            
            $table -> foreignId('category_id')
                   -> constrained();
            $table -> foreignId('product_id')
                   -> constrained(); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
           $table -> dropForeign(['typology_id']);
           $table -> dropColumn('typology_id');

        });

        Schema::table('category_product', function (Blueprint $table) {
            $table -> dropForeign(['category_id']);
            $table -> dropColumn('category_id');

            $table -> dropForeign(['product_id']);
            $table -> dropColumn('product_id');
         });
    }
};
