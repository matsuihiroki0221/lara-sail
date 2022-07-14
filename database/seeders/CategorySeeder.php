<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'ドリンク'
        ]);
        Category::create([
            'name' => 'アルコール'
        ]);
        Category::create([
            'name' => 'ソフトドリンク'
        ]);
        Category::create([
            'name' => '一品物'
        ]);
        Category::create([
            'name' => 'サラダ'
        ]);
        Category::create([
            'name' => '肉・魚'
        ]);
        Category::create([
            'name' => 'ごはん系'
        ]);
        Category::create([
            'name' => 'デザート'
        ]);
    }
}
