<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'weight',
        'quantity',
        'cost_price',
        'unit_price',
        'total_income',
        'profit_or_loss',
        'employee_id',
        'product_id'
    ];

    public function product (): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
