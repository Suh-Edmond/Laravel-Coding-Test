<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('price', 15, 3);
            $table->longText('description');
            $table->string('image');
            $table->unsignedBigInteger('product_condition_id');
            $table->boolean('discount')->nullable();
            $table->boolean('in_stocked')->nullable();
            $table->boolean('publish')->nullable();
            $table->foreign('product_condition_id')
                ->references('id')
                ->on('product_conditions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
