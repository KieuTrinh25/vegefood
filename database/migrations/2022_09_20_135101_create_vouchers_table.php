<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->String('code', 128);
            $table->float('discount', 5, 2)->default(1);
            $table->integer('quantity')->default(0);
            $table->timestamp('time_from')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('time_end')->default(DB::raw('CURRENT_TIMESTAMP'));
            
           
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
        Schema::dropIfExists('vouchers');
    }
};
