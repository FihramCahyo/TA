<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'makanan_id',
        'type',
        'user_id',
    ];

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }

    public static function getTypes()
    {
        return ['pengeluaran', 'pemasukan']; // Gantilah ini dengan nilai enum sebenarnya
    }
}
