<?php

use Illuminate\Database\Seeder;
use carbon\Carbon;

class LoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Hoa lẻ", "Phụ liệu", "Bó hoa", "Giỏ hoa", "Hoa hộp giấy",
            "Kệ hoa", "Vòng hoa", "Bình hoa", "Hoa hộp gỗ"];
        
        sort($types);

        $today = new carbon('2018-11-01 18:20:00');
      
        for ($i=1; $i<=count($types); $i++){
            array_push($list,
            [
                'l_ma' => $i,
                'l_ten' => $types[$i-1],
                'l_taoMoi' => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s'),
            ]);
        }
        DB::table('loai')->insert($list);
    }
}
