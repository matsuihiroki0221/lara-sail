<?php

namespace App\Interfaces;

use App\Models\Image;

interface ImageInterface {
    public function index();

    public function store($request, Image $image);

    public function show(Image $image);

    public function update($request, Image $image);

    public function destroy(Image $image);
}