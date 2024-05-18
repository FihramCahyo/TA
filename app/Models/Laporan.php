<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'makanan_name',
        'price',
        'type',
        'user_name',
        'restaurant_name',
    ];
}
