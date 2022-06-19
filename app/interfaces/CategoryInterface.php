<?php

namespace App\Interfaces;

use App\Models\Category;

interface CategoryInterface {
    public function index();

    public function tagsIndex();

    public function store($request);

    public function show(Category $category);

    public function update($request, Category $category);

    public function destroy(Category $category);
}