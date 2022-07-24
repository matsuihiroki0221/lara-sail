<?php

namespace App\Repositories;

use App\Interfaces\SalesProductInterface;
use App\Models\SalesProduct;
use App\Models\SalesDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalesProductRepository implements SalesProductInterface {
    // 一覧取得
    public function index($storeId = null) {
        $salesDetail =  SalesDetail::when(
                $storeId,
                function ($query,$storeId) {
                    $query->where('id', $storeId)->firstOrFail();
            })
            ->unless(
                $storeId,
                function ($query) {
                    $query->where('id', Auth::id())->firstOrFail();
            });
        return $salesDetail->salesProducts();
    }

    // 新規登録
    public function store($request){
        DB::beginTransaction();
        try {
            $params = $request->all();
            Log::info($params);
            $salesDetail = SalesDetail::where('status',config('status.order_detail')[1])
                ->firstOrNew([
                    'store_id' => $params['other_info']['store_id'],
                    'table_no' => $params['other_info']['table_no'],
                ]);
            if(empty($salesDetail->store_id)) {
                $salesDetail->store_id = $params['other_info']['store_id'];
            }
            $salesDetail->table_no = $params['other_info']['table_no'];
            $salesDetail->save();
            
            $salesDetail->salesProducts()->create($params["order_content"]);

            DB::commit();
        }  catch(\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    // 詳細を取得
    public function show($salesproduct){
        return $salesproduct;
    }

    // 更新処理
    public function update($request, $salesproduct){
        $salesproduct->fill($request)->save();
    }

    // 削除
    public function destroy($salesproduct) {
        $salesproduct->delete();
    }

    // status更新
    public function changeStatus($request) {
        $salesProduct = SalesProduct::where('id',$request->id)->firstOrFail();
        return DB::transaction(function () use ($request, $salesProduct) {
            $salesProduct->status = $request->status;
            $salesProduct->save();
        });
    }
}