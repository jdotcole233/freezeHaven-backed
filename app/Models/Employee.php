<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'gender',
        'dob',
        'date_employed',
        'date_of_termination',
        'location'
    ];

    public function products (): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function salaries (): HasMany
    {
        return $this->hasMany(EmployeeSalary::class);
    }

    public function transactions (): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
