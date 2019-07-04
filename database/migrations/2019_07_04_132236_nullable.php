<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
        Schema::table('banners', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
        });

        Schema::table('symbolism', function (Blueprint $table) {
            $table->string('gerb')->nullable()->change();
            $table->string('emblem')->nullable()->change();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
