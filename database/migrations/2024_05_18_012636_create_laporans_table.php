<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('makanan_name');
            $table->decimal('price', 10, 2);
            $table->enum('type', ['pengeluaran', 'pemasukan']);
            $table->string('user_name');
            $table->string('restaurant_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
