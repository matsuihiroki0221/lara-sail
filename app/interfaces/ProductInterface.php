<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductInterface {
    public function store($request);

    public function update($request, Product $product);

    public function index();

    public function show($product);

    public function destroy(Product $product);
}