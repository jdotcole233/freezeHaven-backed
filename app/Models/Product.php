<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_type',
        'product_category',
        'user_id',
        'product_img',
        'status'
    ];

    public function employee (): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function product_details (): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }
}
