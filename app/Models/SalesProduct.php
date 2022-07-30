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

    public function salesDetail():BelongsTo {
        return $this->belongsTo(SalesDetail::class);
    }

    public function products() {
        return $this->belongsTo(Product::class);
    
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
