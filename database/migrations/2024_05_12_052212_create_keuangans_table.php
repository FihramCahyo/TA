<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuangansTable extends Migration
{
    public function up()
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('type', 20);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keuangans');
    }
}
