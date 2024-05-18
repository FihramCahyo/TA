<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'price',
        'description',
    ];

    public function keuangans()
    {
        return $this->hasMany(Keuangan::class);
    }
}
