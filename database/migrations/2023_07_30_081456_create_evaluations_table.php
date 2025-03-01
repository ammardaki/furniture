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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id');
            // $table->foreignId('furniture_id'); 
            $table->foreignId('user_id')->nullable()->constrained('users')->unsigned()->cascadeOnDelete();
            $table->foreignId('furniture_id')->nullable()->constrained('furniture')->unsigned()->cascadeOnDelete(); 
            $table->integer('value')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
};
