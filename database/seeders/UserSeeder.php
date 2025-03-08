<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('id',1)->delete();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'super_admin@pg-innovation.com',
                'password'=>Hash::make('123456'),
                'is_active'=>1,
                'is_logged_in'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        ]);
    }
}
