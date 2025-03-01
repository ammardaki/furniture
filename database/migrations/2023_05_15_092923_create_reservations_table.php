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
        if (!Schema::hasTable('reservations')) {
            Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained('users')->unsigned()->cascadeOnDelete();
                $table->foreignId('furniture_id')->nullable()->constrained('furniture')->unsigned()->cascadeOnDelete();
                $table->date('date'); //????????//
                $table->integer('quantity')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('reservations', 'time')) {
            Schema::table('reservations', function (Blueprint $table) {
                $table->string('time');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
