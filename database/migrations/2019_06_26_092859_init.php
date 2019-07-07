<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symbolism', function (Blueprint $table) {
            $table->increments('id');
            $table->text('gimn')->nullable();
            $table->string('gerb')->nullable();
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('symbolism')->insert([
            'gimn' => '',
            'gerb' => ''
        ]);
        Schema::create('main_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_label')->nullable();
            $table->text('history')->nullable();
            $table->text('teachers')->nullable();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('main_texts')->insert([
            'banner_label' => '',
            'history' => '',
            'teachers' => ''
        ]);

        Schema::create('atestations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('znos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('psychologic_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });
        Schema::create('methodical_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });
        Schema::create('vihov_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });
        Schema::create('education_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('inclusive_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('profile_learns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });
        Schema::create('public_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });
        Schema::create('for_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('for_parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('nushes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();
        });
        Schema::create('prides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('text');
            $table->timestamps();
        });
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('text');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
        Schema::dropIfExists('prides');
        Schema::dropIfExists('nushes');
        Schema::dropIfExists('for_parents');
        Schema::dropIfExists('for_students');
        Schema::dropIfExists('news');
        Schema::dropIfExists('public_informations');
        Schema::dropIfExists('profile_learns');
        Schema::dropIfExists('inclusive_works');
        Schema::dropIfExists('education_works');
        Schema::dropIfExists('vihov_works');
        Schema::dropIfExists('methodical_works');
        Schema::dropIfExists('psychologic_works');
        Schema::dropIfExists('libraries');
        Schema::dropIfExists('znos');
        Schema::dropIfExists('atestations');
        Schema::dropIfExists('main_texts');
        Schema::dropIfExists('symbolism');




    }
}
