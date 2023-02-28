<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_price',
        'worker_type',
        'status'
    ];
}
