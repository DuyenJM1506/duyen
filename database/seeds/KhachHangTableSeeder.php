<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $today = new carbon('2018-11-01 18:20:00');

        array_push($list,
        [
            'kh_taiKhoan' => 'NVA',
            'kh_matKhau' => 'A123',
            'kh_hoTen' => 'Nguyễn Văn A',
            'kh_gioiTinh' => '1',
            'kh_email' => 'nva@gmail.com',
            'kh_ngaySinh' => '1990-06-09',
            'kh_diaChi' => 'Mậu Thân, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ',
            'kh_dienThoai' => '0326465624',
            'kh_taoMoi' => '2018-11-01 19:00:01',
            'kh_capNhat' => '2018-11-01 19:10:09',
        ]); 
      
        array_push($list,
        [
            'kh_taiKhoan' => 'NVB',
            'kh_matKhau' => 'A123',
            'kh_hoTen' => 'Nguyễn Văn A',
            'kh_gioiTinh' => '1',
            'kh_email' => 'nva@gmail.com',
            'kh_ngaySinh' => '1990-06-09',
            'kh_diaChi' => 'Mậu Thân, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ',
            'kh_dienThoai' => '0326465624',
            'kh_taoMoi' => '2018-11-01 19:00:01',
            'kh_capNhat' => '2018-11-01 19:10:09',

        ]);
      
        DB::table('loai')->insert($list);
    }
}
