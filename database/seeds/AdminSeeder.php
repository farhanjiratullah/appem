<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'nama_petugas' => 'admin 1',
            'username' => 'admin1',
            'password' => bcrypt('12345678'),
            'telp' => '081212345678',
            'level' => 'admin'
        ]);
    }
}
