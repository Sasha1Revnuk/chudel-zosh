<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlNewsAndAnnonceent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('url')->after('name');
            $table->string('name')->unique()->change();
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->string('url')->after('name');
            $table->string('name')->unique()->change();
            $table->string('description')->after('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
