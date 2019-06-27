<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'email',
            'value' => 'chudel_znz@ukr.net',
        ]);
        DB::table('settings')->insert([
            'name' => 'address',
            'value' => 'с.Чудель, вул.Шкільна, 9 ',
        ]);
        DB::table('settings')->insert([
            'name' => 'phone',
            'value' => '14789630',
        ]);



        DB::table('menus')->insert([
            'name' => 'Головна',
            'src' => '/',
            'parent_id' => 0,

        ]);
        DB::table('menus')->insert([
            'name' => 'Інформаційний віділ',
            'src' => 'parent',
            'parent_id' => 0,

        ]);
        DB::table('menus')->insert([
            'name' => 'Візитка школи',
            'src' => '/business-school',
            'parent_id' => \App\Models\Menu::where('name', 'Інформаційний віділ')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Історія школи',
            'src' => '/school-history',
            'parent_id' => \App\Models\Menu::where('name', 'Інформаційний віділ')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Адміністрація та вчителі ',
            'src' => '/teachers',
            'parent_id' => \App\Models\Menu::where('name', 'Інформаційний віділ')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Фотоальбоми',
            'src' => '/gallery',
            'parent_id' => \App\Models\Menu::where('name', 'Інформаційний віділ')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Документообіг',
            'src' => '/documents',
            'parent_id' => \App\Models\Menu::where('name', 'Інформаційний віділ')->first()->id,

        ]);

        DB::table('menus')->insert([
            'name' => 'Прес-центр',
            'src' => 'parent',
            'parent_id' => 0,

        ]);

        DB::table('menus')->insert([
            'name' => 'Новини',
            'src' => '/news',
            'parent_id' => \App\Models\Menu::where('name', 'Прес-центр')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Оголошення',
            'src' => '/announcements',
            'parent_id' => \App\Models\Menu::where('name', 'Прес-центр')->first()->id,

        ]);


        DB::table('menus')->insert([
            'name' => 'Навчальний процес',
            'src' => 'parent',
            'parent_id' => 0,

        ]);

        DB::table('menus')->insert([
            'name' => 'Методична робота',
            'src' => '/methodical-works',
            'parent_id' => \App\Models\Menu::where('name', 'Навчальний процес')->first()->id,

        ]);

        DB::table('menus')->insert([
            'name' => 'Виховна робота',
            'src' => '/educational-works',
            'parent_id' => \App\Models\Menu::where('name', 'Навчальний процес')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Для учнів',
            'src' => 'parent',
            'parent_id' => 0,

        ]);
        DB::table('menus')->insert([
            'name' => 'ЗНО',
            'src' => '/zno',
            'parent_id' => \App\Models\Menu::where('name', 'Для учнів')->first()->id,

        ]);

        DB::table('menus')->insert([
            'name' => 'ДПА',
            'src' => '/dpa',
            'parent_id' => \App\Models\Menu::where('name', 'Для учнів')->first()->id,

        ]);

        DB::table('menus')->insert([
            'name' => 'Розклад уроків',
            'src' => '/shedule',
            'parent_id' => \App\Models\Menu::where('name', 'Для учнів')->first()->id,

        ]);
        DB::table('menus')->insert([
            'name' => 'Розклад дзвінків',
            'src' => '/call-shedule',
            'parent_id' => \App\Models\Menu::where('name', 'Для учнів')->first()->id,

        ]);

        DB::table('menus')->insert([
            'name' => 'Правила поведінки',
            'src' => '/rules',
            'parent_id' => \App\Models\Menu::where('name', 'Для учнів')->first()->id,

        ]);

        DB::table('menus')->insert([
            'name' => 'Контакти',
            'src' => '/contacts',
            'parent_id' => 0,

        ]);

    }
}
