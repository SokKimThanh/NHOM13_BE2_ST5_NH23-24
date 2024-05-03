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
                'protype_name' => 'Truyền Thống',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'protype_name' => 'Cách Tân',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'protype_name' => 'Tay Bồng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        DB::table("products")->insert([
            [
                'name' => 'Áo dài cách tân 01',
                'price' =>  '250000',
                'quantity' =>  '0',
                'image' => 'sanpham1.jpg',
                'description' => 'Áo dài cách tân mang lại những nét nổi bật mới.',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài truyền thống 01',
                'price' =>  '219000',
                'quantity' =>  '25',
                'image' => 'sanpham2.jpg',
                'description' => 'Áo dài truyền thống mang đậm tính cổ truyền với màu sắc, họa tiết có phần biến tấu.',
                'protype_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài tay bồng C1',
                'price' =>  '300000',
                'quantity' =>  '50',
                'image' => 'sanpham3.jpg',
                'description' => 'Áo dài tay bồng mang lại cảm giác mới mẻ, nhẹ nhàng.',
                'protype_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài cách tân 02',
                'price' =>  '210000',
                'quantity' =>  '25',
                'image' => 'sanpham4.jpg',
                'description' => 'Áo dài cách tân với những nét nổi bật, sáng tạo mới.',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài cách tân 03',
                'price' =>  '250000',
                'quantity' =>  '45',
                'image' => 'sanpham5.jpg',
                'description' => 'Áo dài cách tân mang lại những nét nổi bật mới, mang phong cách trẻ trung hơn.',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài truyền thống 02',
                'price' =>  '200000',
                'quantity' =>  '0',
                'image' => 'sanpham6.jpg',
                'description' => 'Áo dài truyền thống mang đậm tính cổ truyền với họa tiết thiên nhiên đổi mới.',
                'protype_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo dài tay bồng 02',
                'price' =>  '230000',
                'quantity' =>  '14',
                'image' => 'sanpham7.jpg',
                'description' => 'Áo dài tay bồng mang lại cảm giác mới mẻ, nhẹ nhàng.',
                'protype_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        
    }
}
