<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
        'company_id',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    /**
     * 売上詳細を取得
     */
    public function salesDetails() {
        return $this->hasMany(SalesDetail::class);
    }

    /**
     *商品情報を取得
     */
    public function salesProducts() {
        return $this->hasMany(SalesProduct::class);
    }
}
