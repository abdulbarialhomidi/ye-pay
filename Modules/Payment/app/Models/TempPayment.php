<?php

namespace Modules\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payment\Database\Factories\TempPaymentFactory;

class TempPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'wallet_name',
        'reference_id',
        'wallet_reference_id',
        'status',
    ];

    // protected static function newFactory(): TempPaymentFactory
    // {
    //     // return TempPaymentFactory::new();
    // }
}
