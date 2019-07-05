<?php

namespace App;


class Utils
{

    public static function transliterate($string)
    {
        $trans = ['ый' => 'iy', 'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
            'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' '=>'-'];

        $string = strtr(trim(mb_strtolower($string)), $trans);
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);

        $string = strtr($string, ['---' => '-', '--' => '-']);
        $string = strtr($string, ['---' => '-', '--' => '-']);
        if(substr($string, -1, 1) === '-')
            $string = substr($string, 0, strlen($string)-1);

        return trim($string,'-');
    }
}