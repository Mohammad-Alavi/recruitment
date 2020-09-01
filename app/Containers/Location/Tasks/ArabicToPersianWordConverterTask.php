<?php

namespace App\Containers\Location\Tasks;

use App\Ship\Parents\Tasks\Task;

class ArabicToPersianWordConverterTask extends Task
{
    public function run($ngoName)
    {
        return self::arabicToPersian($ngoName);
    }

    public static function arabicToPersian($string)
    {
        $characters = [
            'ك' => 'ک',
            'دِ' => 'د',
            'بِ' => 'ب',
            'زِ' => 'ز',
            'ذِ' => 'ذ',
            'شِ' => 'ش',
            'سِ' => 'س',
            'ى' => 'ی',
            'ي' => 'ی',
            '١' => '۱',
            '٢' => '۲',
            '٣' => '۳',
            '٤' => '۴',
            '٥' => '۵',
            '٦' => '۶',
            '٧' => '۷',
            '٨' => '۸',
            '٩' => '۹',
            '٠' => '۰',
        ];
        return str_replace(array_keys($characters), array_values($characters), $string);
    }

}
