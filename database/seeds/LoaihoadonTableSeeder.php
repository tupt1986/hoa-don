<?php

use Illuminate\Database\Seeder;
use App\loaihoadon;
class LoaihoadonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaihoadon1 = new Loaihoadon();
        $loaihoadon1 -> ten = 'Hóa đơn BD 01-2L';
        $loaihoadon1 -> mau = '01GTKT2/001';
        $loaihoadon1 -> kyhieu = 'AA/11P';
        $loaihoadon1 -> save();

        $loaihoadon2 = new Loaihoadon();
        $loaihoadon2 -> ten = 'Hóa đơn BD 01-3L';
        $loaihoadon2 -> mau = '01GTKT3/001';
        $loaihoadon2 -> kyhieu = 'AA/11P';
        $loaihoadon2 -> save();

        $loaihoadon3 = new Loaihoadon();
        $loaihoadon3 -> ten = 'Hóa đơn BC 01-2L';
        $loaihoadon3 -> mau = '01GTKT2/001';
        $loaihoadon3 -> kyhieu = 'AA/16P';
        $loaihoadon3 -> save();

        $loaihoadon4 = new Loaihoadon();
        $loaihoadon4 -> ten = 'Hóa đơn BC 01-3L';
        $loaihoadon4 -> mau = '01GTKT3/001';
        $loaihoadon4 -> kyhieu = 'AA/16P';
        $loaihoadon4 -> save();
    }
}
