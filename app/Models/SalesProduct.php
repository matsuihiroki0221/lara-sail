<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesProduct extends Model
{
    use HasFactory, SoftDeletes;

    /**
     *
     * @var array
     */
    protected $fillable = [
        "sales_detail_id",
        "product_id",
        "published_at",
        "number_purchases"
    ];

    protected function salesDetail():BelongsTo {
        return $this->belongsTo(SalesDetail::class);
    }

    protected function products() {
        return $this->belongsTo(Product::class);
    
    }
    
}
