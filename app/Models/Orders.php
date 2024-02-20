<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'beverage',
        'payments_id',
        'total',
        'order_date',
        'buyer',
        'address',
    ];

    public function payments(){
        return $this->belongsTo(Payments::class, 'payments_id');
    }
}
