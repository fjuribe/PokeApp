<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToVistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vistas', function (Blueprint $table) {
            //
            // $table->string('slug')->unique();
            $table->string('slug')->unique()->nullable($value=true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vistas', function (Blueprint $table) {
           $table->dropColumn('slug');
        });
    }
}
