<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "store_id",
        "total_amount",
        "total_tax_amount",
        "total_number_purchases",
        "deposit_amount",
        "change",
        "published_at"
    ];

    /**
     * 税抜き合計金額
     *
     * @var array
     */
    // protected $appends = ['total_non_taxed_price'];

    /**
     * ユーザーの名前の取得
     *
     * @param  string  $value
     * @return string
     */
    // public function getTotalNonTaxedPriceAttribute($value) {
    //     return $this->total_amount - $this->total_tax_amount;
    // }

    /**
     * 売上詳細を取得
     */
    public function salesProducts() {
        return $this->hasMany(SalesProduct::class);
    }

}
