<?php

namespace App\Containers\Country\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder_1 extends Seeder
{
    public function run(): void
    {
        $countries = array(
            ["name" => "ایران"],
            ["name" => "افغانستان"],
            ["name" => "آبخاز"],
            ["name" => "آذربایجان"],
            ["name" => "آرژانتین"],
            ["name" => "آفریقای جنوبی"],
            ["name" => "آفریقای مرکزی"],
            ["name" => "آلبانی"],
            ["name" => "آلمان"],
            ["name" => "آمریکا"],
            ["name" => "آنتیگوآ و باربودا"],
            ["name" => "آندورا"],
            ["name" => "آنگولا"],
            ["name" => "ارمنستان"],
            ["name" => "الجزایر"],
            ["name" => "اندونزی"],
            ["name" => "اتیوپی"],
            ["name" => "اریتره"],
            ["name" => "اسپانیا"],
            ["name" => "استونی"],
            ["name" => "اسلوواکی"],
            ["name" => "اسلوونی"],
            ["name" => "اکووادور"],
            ["name" => "السالوادور"],
            ["name" => "امارات متحده عربی"],
            ["name" => "اتریش"],
            ["name" => "اردن"],
            ["name" => "ازبکستان"],
            ["name" => "استرالیا"],
            ["name" => "اوروگوئه"],
            ["name" => "اوکراین"],
            ["name" => "اوگاندا"],
            ["name" => "ایتالیا"],
            ["name" => "ایرلند"],
            ["name" => "ایسلند"],
            ["name" => "باربادوس"],
            ["name" => "باهاما"],
            ["name" => "بحرین"],
            ["name" => "بنگلادش"],
            ["name" => "برزیل"],
            ["name" => "برونئی"],
            ["name" => "بریتانیا "],
            ["name" => "بلاروس"],
            ["name" => "بلژیک"],
            ["name" => "بلیز"],
            ["name" => "بنین"],
            ["name" => "بلغارستان"],
            ["name" => "بوتان"],
            ["name" => "بوتسوآنا"],
            ["name" => "بورکینافاسو"],
            ["name" => "بوروندی "],
            ["name" => "بوسنی و هرزگوین"],
            ["name" => "بولیوی"],
            ["name" => "پاپواگینه نو"],
            ["name" => "پاراگوئه"],
            ["name" => "پاکستان"],
            ["name" => "پالائو"],
            ["name" => "پاناما"],
            ["name" => "پرو "],
            ["name" => "پرتغال"],
            ["name" => "تاجیکستان"],
            ["name" => "تانزانیا"],
            ["name" => "تایلند"],
            ["name" => "تایوان"],
            ["name" => "ترانسنیستریا"],
            ["name" => "ترینیداد و توباگو"],
            ["name" => "تیمور شرقی"],
            ["name" => "ترکمنستان"],
            ["name" => "ترکیه"],
            ["name" => "توگو"],
            ["name" => "تونس"],
            ["name" => "تونگا"],
            ["name" => "تووالو"],
            ["name" => "جامائیکا"],
            ["name" => "جزایر سلیمان"],
            ["name" => "جزایر کوک"],
            ["name" => "جزایر مارشال"],
            ["name" => "جمهوری صحرای غربی"],
            ["name" => "جیبوتی"],
            ["name" => "چاد"],
            ["name" => "چک"],
            ["name" => "چین"],
            ["name" => "دانمارک"],
            ["name" => "دومینیکا"],
            ["name" => "دومینیکن"],
            ["name" => "رژیم صهیونیستی"],
            ["name" => "روآندا"],
            ["name" => "روسیه"],
            ["name" => "رومانی"],
            ["name" => "زامبیا"],
            ["name" => "زئیر(کنگو)"],
            ["name" => "زلاندنو"],
            ["name" => "زیمبابوه"],
            ["name" => "ژاپن"],
            ["name" => "سائوتومه و پرنسیپ"],
            ["name" => "ساحل عاج"],
            ["name" => "سن مارینو"],
            ["name" => "سنگاپور"],
            ["name" => "سریلانکا"],
            ["name" => "سنت کیتس و نویس"],
            ["name" => "سنت لوسیا"],
            ["name" => "سنت وینست و گرنادین ها"],
            ["name" => "سنگال"],
            ["name" => "سوئد"],
            ["name" => "سوئیس"],
            ["name" => "سوازیلند"],
            ["name" => "سودان"],
            ["name" => "سودان جنوبی"],
            ["name" => "سورینام"],
            ["name" => "سوریه"],
            ["name" => "سومالی"],
            ["name" => "سومالی لند"],
            ["name" => "سیرالئون"],
            ["name" => "سیشل"],
            ["name" => "شیلی "],
            ["name" => "صربستان"],
            ["name" => "عراق"],
            ["name" => "عربستان"],
            ["name" => "عمان"],
            ["name" => "غنا"],
            ["name" => "فرانسه"],
            ["name" => "فنلاند"],
            ["name" => "فلسطین"],
            ["name" => "فیجی"],
            ["name" => "فیلیپین"],
            ["name" => "قره باغ"],
            ["name" => "قزاقستان"],
            ["name" => "قطر"],
            ["name" => "قبرس"],
            ["name" => "قبرس شمالی"],
            ["name" => "قرقیزستان"],
            ["name" => "کاستاریکا"],
            ["name" => "کامبوج"],
            ["name" => "کامرون"],
            ["name" => "کانادا"],
            ["name" => "کنیا"],
            ["name" => "کرواسی"],
            ["name" => "کرۀ جنوبی"],
            ["name" => "کرۀ شمالی"],
            ["name" => "کلمبیا"],
            ["name" => "کویت"],
            ["name" => "کوبا"],
            ["name" => "کوزوو"],
            ["name" => "کومور"],
            ["name" => "کیپ ورد"],
            ["name" => "کیریباس"],
            ["name" => "گابون"],
            ["name" => "گامبیا"],
            ["name" => "گرنادا"],
            ["name" => "گواتمالا"],
            ["name" => "گویان"],
            ["name" => "گینه"],
            ["name" => "گینۀ استوائی"],
            ["name" => "گینۀ بیسائو"],
            ["name" => "لائوس"],
            ["name" => "لهستان"],
            ["name" => "لتونی"],
            ["name" => "لسوتو"],
            ["name" => "لبنان"],
            ["name" => "لوکزامبورک"],
            ["name" => "لیبریا"],
            ["name" => "لیبی"],
            ["name" => "لیتوانی"],
            ["name" => "لیختن اشتاین"],
            ["name" => "ماداگاسکار"],
            ["name" => "مالاوی"],
            ["name" => "مالت"],
            ["name" => "مالدیو"],
            ["name" => "مالزی"],
            ["name" => "مالی"],
            ["name" => "مجارستان"],
            ["name" => "مراکش(مغرب)"],
            ["name" => "مقدونیه"],
            ["name" => "مصر"],
            ["name" => "مکزیک"],
            ["name" => "مغولستان"],
            ["name" => "موریتانی"],
            ["name" => "موریس"],
            ["name" => "موزامبیک"],
            ["name" => "مولداوی"],
            ["name" => "موناکو"],
            ["name" => "مونته نگرو"],
            ["name" => "میانمار(برمه)"],
            ["name" => "میکرونوزی"],
            ["name" => "نائورو"],
            ["name" => "نامیبیا"],
            ["name" => "نپال"],
            ["name" => "نروژ"],
            ["name" => "نیجر"],
            ["name" => "نیجریه"],
            ["name" => "نیکاراگوئه"],
            ["name" => "نیووی"],
            ["name" => "واتیکان"],
            ["name" => "وانواتو"],
            ["name" => "ونزوئلا"],
            ["name" => "ویتنام"],
            ["name" => "هائیتی"],
            ["name" => "هندوستان"],
            ["name" => "هلند"],
            ["name" => "هندوراس"],
            ["name" => "یمن"],
            ["name" => "یونان"]
        );
        DB::table('countries')->insert($countries);
    }
}
