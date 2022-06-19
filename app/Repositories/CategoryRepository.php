<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface {
    // 一覧取得
    public function index() {
        $category = Category::with('products')->get();
        return $category;
    }
    // 一覧取得
    public function tagsIndex() {
        $category = Category::all()->pluck('name', 'id');
        return $category;
    }

    // 新規登録
    public function store($request){
        $category = new Category;
        $params = $request->all();
        $category->fill($params)->save();

    }

    // 詳細を取得
    public function show(Category $category){
        return $category;
    }

    // 更新処理
    public function update($request, $category){
        $category->fill($request)->save();
    }

    // 削除
    public function destroy(Category $category) {
        $category->delete();
    }
}