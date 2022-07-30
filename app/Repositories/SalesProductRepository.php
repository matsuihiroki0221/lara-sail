<?php

namespace App\Repositories;

use App\Events\newOrdered;
use App\Interfaces\SalesProductInterface;
use App\Models\SalesProduct;
use App\Models\SalesDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SalesProductResource;
use Illuminate\Database\Eloquent\Builder;

class SalesProductRepository implements SalesProductInterface {
    // 一覧取得
    public function index() {
        // $salesDetail =  SalesDetail::where('store_id', Auth::id())
        //                     ->where('status', config('status.order_detail')[1])
        //                     ->salesProducts();
        $SalesProducts = SalesProduct::wherehas('salesDetail',
                fn(Builder $query) => $query->where('store_id', Auth::id())
             )
             ->orderBy('created_at')
             ->get();
        return $SalesProducts;
    }

    // 新規登録
    public function store($request){
        DB::beginTransaction();
        try {
            $params = $request->all();
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
            $SalesProducts = SalesProduct::wherehas('salesDetail',
                fn(Builder $query) => $query->where('store_id', $salesDetail->store_id)
             )
             ->orderBy('created_at')
             ->get();
            DB::commit();
        }  catch(\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
        event(new newOrdered(SalesProductResource::collection($SalesProducts)));
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