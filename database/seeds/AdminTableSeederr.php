<?php

use Illuminate\Database\Seeder;

class AdminTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('user')->truncate();
        App\User::create([
        	'name' => 'Nguyễn Yến Duyên',
        	'username' =>'nyduyen',
        	'password' => bcrypt('duyen123')
        ]);
        DB::table('user')->truncate();
        App\User::create([
        	'name' => 'Trần Thị Cẫm Châu',
        	'username' =>'ttcchau',
        	'password' => bcrypt('chau456')
        ]);

    }
}
