<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCandiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candies', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->default(DB::raw('(UUID())'));
            $table->string('name')->nullable();
            $table->string('sku')->nullable()->unique();
            $table->decimal('price', 11,2)->default(0.00);
            $table->text('details')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candies');
    }
}
