<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_production extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'bill_price',
        'qty',
        'total'
    ];

    public $timestamps = true;
}
