<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToMakanansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('makanans', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('makanans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
