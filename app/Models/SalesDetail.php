<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    /**
     * 複数代入不可能な属性
     *
     * @var array
     */
    protected $guarded = [
        "id",
        "branch_id",
    ];

    /**
     * 税抜き合計金額
     *
     * @var array
     */
    protected $appends = ['total_non_taxed_price'];

    /**
     * ユーザーの名前の取得
     *
     * @param  string  $value
     * @return string
     */
    public function getTotalNonTaxedPriceAttribute($value) {
        return $this->total_amount - $this->total_tax_amount;
    }

    /**
     * 売上詳細を取得
     */
    public function salesProducts() {
        return $this->hasMany(SalesProduct::class);
    }

}
