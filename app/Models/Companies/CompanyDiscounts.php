<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDiscounts extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'company_id',
        'discount_id'
    ];
}
