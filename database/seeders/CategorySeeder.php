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
            'branch_id' => 1,
            'name' => 'ドリンク'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => 'アルコール'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => 'ソフトドリンク'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => '一品物'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => 'サラダ'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => '肉・魚'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => 'ごはん系'
        ]);
        Category::create([
            'branch_id' => 1,
            'name' => 'デザート'
        ]);
    }
}
