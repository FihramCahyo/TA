<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Makanan extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'image_path',
        'price',
        'description',
    ];

    protected $dates = ['deleted_at'];



    public function keuangans()
    {
        return $this->hasMany(Keuangan::class);
    }
}
