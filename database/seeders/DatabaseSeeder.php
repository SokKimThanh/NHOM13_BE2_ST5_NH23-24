<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Sok Kim Thanh',
        //     'email' => 'thanhsk1991@gmail.com',
        //     'email_verified_at' => '',
        //     'password' => 'admin123',

        // ]);
        DB::table("users")->insert([
            [
                'name' => 'Sok Kim Thanh',
                'email' => 'thanhsk1991@gmail.com',
                'email_verified_at' => 'null',
                'password' => bcrypt('admin123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Le Cong Chien',
                'email' => 'cle960272@gmail.com',
                'email_verified_at' => 'null',
                'password' => bcrypt('chien122004'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        DB::table("protype")->insert([
            [
                'protype_name' => 'Truyền thống',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'protype_name' => 'Cách tân',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'protype_name' => 'Tay bồng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        DB::table("products")->insert([
            [
                'name' => 'Áo dài cách tân 01',
                'price' =>  '1.00',
                'image' => 'sanpham1.jpg',
                'protype_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài truyền thống 01',
                'price' =>  '1.00',
                'image' => 'sanpham2.jpg',
                'protype_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài tay bồng C1',
                'price' =>  '1.00',
                'image' => 'sanpham3.jpg',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài cách tân 02',
                'price' =>  '1.00',
                'image' => 'sanpham4.jpg',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài cách tân 03',
                'price' =>  '1.00',
                'image' => 'sanpham5.jpg',
                'protype_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài truyền thống 02',
                'price' =>  '1.00',
                'image' => 'sanpham6.jpg',
                'protype_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        
    }
}
