<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('methodical_works', function (Blueprint $table) {
            $table->string('url')->after('name');
            $table->string('name')->unique()->change();
        });
        Schema::table('educational_work', function (Blueprint $table) {
            $table->string('url')->after('name');
            $table->string('name')->unique()->change();
        });

        Schema::table('znos', function (Blueprint $table) {
            $table->string('url')->after('name');
            $table->string('name')->unique()->change();
        });

        Schema::table('dpas', function (Blueprint $table) {
            $table->string('url')->after('name');
            $table->string('name')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('methodical_works', function (Blueprint $table) {
            //
        });
    }
}
