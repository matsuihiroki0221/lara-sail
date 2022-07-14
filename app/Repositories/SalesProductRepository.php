<?php

namespace App\Repositories;

use App\Interfaces\SalesProductInterface;
use App\Models\SalesProduct;
use App\Models\SalesDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalesProductRepository implements SalesProductInterface {
    // 一覧取得
    public function index() {
        return SalesProduct::all();
    }

    // 新規登録
    public function store($request){
        DB::commit(); 
        try {
            $params = $request->all();
            Log::info($params);
            $salesDetail = SalesDetail::firstOrNew(['id' => $params['other_info']['sales_detail_id']]);
            if(empty($salesDetail->branch_id)) {
                $salesDetail->branch_id = $params['other_info']['branch_id'];
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
}