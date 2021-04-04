<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'nama_petugas' => 'admin1',
            'username' => 'admin1',
            'password' => Hash::make('12345678'),
            'telp' => '081212345678',
            'level' => 'admin',
        ]);
    }
}
