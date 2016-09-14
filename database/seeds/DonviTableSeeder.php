<?php

use Illuminate\Database\Seeder;
use App\Donvi;

class DonviTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donvi_tinh = new Donvi();
        $donvi_tinh -> tendonvi = 'Bưu điện tỉnh Nghệ An';
        $donvi_tinh -> donvi_id = 0;
        $donvi_tinh -> madonvi = '000046';
        $donvi_tinh -> loaidonvi = 0;
        $donvi_tinh -> save();

        $donvi_huyen1 = new Donvi();
        $donvi_huyen1 -> tendonvi = 'Bưu điện Anh Sơn';
        $donvi_huyen1 -> donvi_id = 1;
        $donvi_huyen1 -> madonvi = '004724';
        $donvi_huyen1 -> loaidonvi = 1;
        $donvi_huyen1 -> save();

        $donvi_huyen2 = new Donvi();
        $donvi_huyen2 -> tendonvi = 'Bưu điện Con Cuông';
        $donvi_huyen2 -> donvi_id = 1;
        $donvi_huyen2 -> madonvi = '004730';
        $donvi_huyen2 -> loaidonvi = 1;
        $donvi_huyen2 -> save();

        $donvi_huyen3 = new Donvi();
        $donvi_huyen3 -> tendonvi = 'Bưu điện Cửa Lò';
        $donvi_huyen3 -> donvi_id = 1;
        $donvi_huyen3 -> madonvi = '004624';
        $donvi_huyen3 -> loaidonvi = 1;
        $donvi_huyen3 -> save();

        $donvi_huyen4 = new Donvi();
        $donvi_huyen4 -> tendonvi = 'Bưu điện Diễn Châu';
        $donvi_huyen4 -> donvi_id = 1;
        $donvi_huyen4 -> madonvi = '004638';
        $donvi_huyen4 -> loaidonvi = 1;
        $donvi_huyen4 -> save();

        $donvi_huyen5 = new Donvi();
        $donvi_huyen5 -> tendonvi = 'Bưu điện Đô Lương';
        $donvi_huyen5 -> donvi_id = 1;
        $donvi_huyen5 -> madonvi = '004714';
        $donvi_huyen5 -> loaidonvi = 1;
        $donvi_huyen5 -> save();

        $donvi_huyen6 = new Donvi();
        $donvi_huyen6 -> tendonvi = 'Bưu điện Hoàng Mai';
        $donvi_huyen6 -> donvi_id = 1;
        $donvi_huyen6 -> madonvi = '004792';
        $donvi_huyen6 -> loaidonvi = 1;
        $donvi_huyen6 -> save();

        $donvi_huyen7 = new Donvi();
        $donvi_huyen7 -> tendonvi = 'Bưu điện Hưng Nguyên';
        $donvi_huyen7 -> donvi_id = 1;
        $donvi_huyen7 -> madonvi = '004743';
        $donvi_huyen7 -> loaidonvi = 1;
        $donvi_huyen7 -> save();

        $donvi_huyen8 = new Donvi();
        $donvi_huyen8 -> tendonvi = 'Bưu điện Kỳ Sơn';
        $donvi_huyen8 -> donvi_id = 1;
        $donvi_huyen8 -> madonvi = '004738';
        $donvi_huyen8 -> loaidonvi = 1;
        $donvi_huyen8 -> save();

        $donvi_huyen9 = new Donvi();
        $donvi_huyen9 -> tendonvi = 'Bưu điện Nam Đàn';
        $donvi_huyen9 -> donvi_id = 1;
        $donvi_huyen9 -> madonvi = '004749';
        $donvi_huyen9 -> loaidonvi = 1;
        $donvi_huyen9 -> save();

        $donvi_huyen10 = new Donvi();
        $donvi_huyen10 -> tendonvi = 'Bưu điện Nghi Lộc';
        $donvi_huyen10 -> donvi_id = 1;
        $donvi_huyen10 -> madonvi = '004626';
        $donvi_huyen10 -> loaidonvi = 1;
        $donvi_huyen10 -> save();

        $donvi_huyen11 = new Donvi();
        $donvi_huyen11 -> tendonvi = 'Bưu điện Nghĩa Đàn';
        $donvi_huyen11 -> donvi_id = 1;
        $donvi_huyen11 -> madonvi = '004674';
        $donvi_huyen11 -> loaidonvi = 1;
        $donvi_huyen11 -> save();

        $donvi_huyen12 = new Donvi();
        $donvi_huyen12 -> tendonvi = 'Bưu điện Quế Phong';
        $donvi_huyen12 -> donvi_id = 1;
        $donvi_huyen12 -> madonvi = '004711';
        $donvi_huyen12 -> loaidonvi = 1;
        $donvi_huyen12 -> save();

        $donvi_huyen13 = new Donvi();
        $donvi_huyen13 -> tendonvi = 'Bưu điện Quỳ Châu';
        $donvi_huyen13 -> donvi_id = 1;
        $donvi_huyen13 -> madonvi = '004797';
        $donvi_huyen13 -> loaidonvi = 1;
        $donvi_huyen13 -> save();

        $donvi_huyen14 = new Donvi();
        $donvi_huyen14 -> tendonvi = 'Bưu điện Quỳ Hợp';
        $donvi_huyen14 -> donvi_id = 1;
        $donvi_huyen14 -> madonvi = '004690';
        $donvi_huyen14 -> loaidonvi = 1;
        $donvi_huyen14 -> save();

        $donvi_huyen15 = new Donvi();
        $donvi_huyen15 -> tendonvi = 'Bưu điện Quỳnh Lưu';
        $donvi_huyen15 -> donvi_id = 1;
        $donvi_huyen15 -> madonvi = '004649';
        $donvi_huyen15 -> loaidonvi = 1;
        $donvi_huyen15 -> save();

        $donvi_huyen16 = new Donvi();
        $donvi_huyen16 -> tendonvi = 'Bưu điện Tân Kỳ';
        $donvi_huyen16 -> donvi_id = 1;
        $donvi_huyen16 -> madonvi = '004684';
        $donvi_huyen16 -> loaidonvi = 1;
        $donvi_huyen16 -> save();

        $donvi_huyen17 = new Donvi();
        $donvi_huyen17 -> tendonvi = 'Bưu điện Thái Hòa';
        $donvi_huyen17 -> donvi_id = 1;
        $donvi_huyen17 -> madonvi = '004772';
        $donvi_huyen17 -> loaidonvi = 1;
        $donvi_huyen17 -> save();

        $donvi_huyen18 = new Donvi();
        $donvi_huyen18 -> tendonvi = 'Bưu điện Thanh Chương';
        $donvi_huyen18 -> donvi_id = 1;
        $donvi_huyen18 -> madonvi = '004757';
        $donvi_huyen18 -> loaidonvi = 1;
        $donvi_huyen18 -> save();

        $donvi_huyen19 = new Donvi();
        $donvi_huyen19 -> tendonvi = 'Bưu điện Tương Dương';
        $donvi_huyen19 -> donvi_id = 1;
        $donvi_huyen19 -> madonvi = '004733';
        $donvi_huyen19 -> loaidonvi = 1;
        $donvi_huyen19 -> save();

        $donvi_huyen20 = new Donvi();
        $donvi_huyen20 -> tendonvi = 'Bưu điện Vinh';
        $donvi_huyen20 -> donvi_id = 1;
        $donvi_huyen20 -> madonvi = '004610';
        $donvi_huyen20 -> loaidonvi = 1;
        $donvi_huyen20 -> save();

        $donvi_huyen21 = new Donvi();
        $donvi_huyen21 -> tendonvi = 'Bưu điện Yên Thành';
        $donvi_huyen21 -> donvi_id = 1;
        $donvi_huyen21 -> madonvi = '004662';
        $donvi_huyen21 -> loaidonvi = 1;
        $donvi_huyen21 -> save();

        $donvi_bc = new Donvi();
        $donvi_bc -> tendonvi = 'Bưu điện Trung tâm Vinh';
        $donvi_bc -> donvi_id = 2;
        $donvi_bc -> madonvi = '460000';
        $donvi_bc -> loaidonvi = 2;
        $donvi_bc -> save();
    }
}
