<?php

namespace Modules\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payment\Database\Factories\PurchaseFactory;

class Purchase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'total',
        'wallet_name',
        'reference_id',
        'request_id',
        'items',
    ];

    // protected static function newFactory(): PurchaseFactory
    // {
    //     // return PurchaseFactory::new();
    // }
}
