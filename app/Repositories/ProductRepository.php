<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductRepository implements ProductInterface {
    // 一覧取得
    public function index() {
        $product = Product::with(['images','categories'])->get();
        return $product;
    }

    //詳細取得
    public function show($id) {
        return Product::with(['images','categories'])->where('id',$id)->first();
    }

    // 新規登録
    public function store($request) {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $newProduct = (array) json_decode($data['product']);
            $basicProduct = new Product;
            $basicProduct->fill($newProduct)->save();
            $basicProduct->categories()->sync($newProduct['categories']);

            // 画像を保存
            if(!empty($data['files'])) {
                $files = $data['files'];
                foreach($files as $index => $file) {
                    $file_name = Str::random(4).$file->getClientOriginalName();
                    $file->storeAs('public/',$file_name);
                    $basicProduct->images()->save(new Image(['name' => $file_name, 'path' => '/storage/'.$file_name]));
                }
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function update($request, Product $product) {
        DB::beginTransaction();
        try {
            $data = $request->all();
            // 商品情報を更新
            $updateProduct = (array) json_decode($data['product']);
            $product->fill($updateProduct)->save();
            $product->refresh();
            $product->categories()->sync($updateProduct['categories']);
            //商品情報に紐づく画像を取得
            $currentImageIds = $product->images()->pluck('id');
            // 送信された画像IDを取得（削除されるはずの画像IDはなし）
            $sendImageIds = collect($updateProduct['images'])->pluck('id');
            //画像を削除
            $deleteImageIds = $currentImageIds->diff($sendImageIds);
            $product->images()->whereIn('id', $deleteImageIds)->delete();
            // 画像を保存

            if(!empty($data['files'])) {
                $files = $data['files'];
                foreach($files as $index => $file) {
                    $file_name = Str::random(4).$file->getClientOriginalName();
                    $file->storeAs('public/',$file_name);
                    $product->images()->save(new Image(['name' => $file_name, 'path' => '/storage/'.$file_name]));
                }
            }
            DB::commit();
        } catch(\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function destroy(Product $product) {
        DB::beginTransaction();
        try {
            Product->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}