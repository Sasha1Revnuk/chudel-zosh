<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingsName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('title');
            $table->string('type');
        });

        DB::transaction(function() {
            $email = \App\Models\Setting::where('name', 'email')->first();
            $email->title = 'Email';
            $email->type = \App\Models\Setting::TYPE_STRING;
            $email->save();

            $address = \App\Models\Setting::where('name', 'address')->first();
            $address->title = 'Адреса';
            $address->type = \App\Models\Setting::TYPE_STRING;
            $address->save();

            $phone = \App\Models\Setting::where('name', 'phone')->first();
            $phone->title = 'Телефон';
            $phone->type = \App\Models\Setting::TYPE_STRING;
            $phone->save();

            $mainPage_news = \App\Models\Setting::where('name', 'mainPage_news')->first();
            $mainPage_news->title = 'Кількість новин на головній сторінці';
            $mainPage_news->type = \App\Models\Setting::TYPE_NUMBER;
            $mainPage_news->save();

            $newsOnPage = \App\Models\Setting::where('name', 'newsOnPage')->first();
            $newsOnPage->title = 'Кількість записів (новини і т.п...) на сторінку';
            $newsOnPage->type = \App\Models\Setting::TYPE_NUMBER;
            $newsOnPage->save();

            $lastNewsOnView = \App\Models\Setting::where('name', 'lastNewsOnView')->first();
            $lastNewsOnView->title = 'Кілкість новин в сайдбарі (збоку справа на сторінці окремої новини)';
            $lastNewsOnView->type = \App\Models\Setting::TYPE_NUMBER;
            $lastNewsOnView->save();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
