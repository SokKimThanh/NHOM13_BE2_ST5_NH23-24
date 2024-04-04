<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table("protype")->insert([
            [
                'protype_name' => 'laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'protype_name' => 'maytinhbang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'protype_name' => 'dienthoai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        DB::table("products")->insert([
            [
                'name' => 'sanpham1',
                'price' =>  '1.00',
                'image' => 'sanpham1.jpg',
                'protype_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sanpham2',
                'price' =>  '1.00',
                'image' => 'sanpham2.jpg',
                'protype_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sanpham3',
                'price' =>  '1.00',
                'image' => 'sanpham3.jpg',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sanpham3',
                'price' =>  '1.00',
                'image' => 'sanpham3.jpg',
                'protype_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sanpham3',
                'price' =>  '1.00',
                'image' => 'sanpham3.jpg',
                'protype_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sanpham3',
                'price' =>  '1.00',
                'image' => 'sanpham3.jpg',
                'protype_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        
    }
}
