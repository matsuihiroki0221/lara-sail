<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

class SalesProduct extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * 複数代入不可能な属性
     *
     * @var array
     */
    protected $guarded = [
        "id",
        "sales_detail_id",
    ];

    protected function salesDetail() {
        return $this->belongsTo(SalesDetail::class);
    }

    protected function products() {
        return $this->HasMany(Product::class);
    
    }
    
}
