<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('kecamatan');
            $table->text('desa');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('jam');
            $table->string('tiket');
            $table->string('img');
            // $table->string('deskripsi');
            $table->timestamps();
        });
        // DB::table('daftars')->insert([
        //     ['nama' => 1, 'kecamatan' => 'WC Umum','' => 'WC Umum'],
        //     ['id' => 2, 'fasilitas' => 'Musholla'],
        //     ['id' => 3, 'fasilitas' => 'Parkir'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftars');
    }
}
