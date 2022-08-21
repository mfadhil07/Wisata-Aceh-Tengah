<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fasilitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('fasilitas');
            $table->timestamps();
        });

        DB::table('fasilitas')->insert([
            ['id' => 1, 'fasilitas' => 'WC Umum'],
            ['id' => 2, 'fasilitas' => 'Musholla'],
            ['id' => 3, 'fasilitas' => 'Parkir'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
}
