<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
        });

        // Insert 5 initial categories
        DB::table('categories')->insert([
            ['name' => 'Adventure Travel'],
            ['name' => 'Beach'],
            ['name' => 'Explore World'],
            ['name' => 'Family Holidays'],
            ['name' => 'Art and Culture'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
