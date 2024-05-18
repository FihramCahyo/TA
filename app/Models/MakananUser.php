<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MakananUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'makanan_id',
        'user_id',
    ];

    public function makanan(): BelongsTo
    {
        return $this->belongsTo(Makanan::class, 'makanan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function makananUser(): BelongsTo
    {
        return $this->belongsTo(MakananUser::class, 'makanan_id', 'id');
    }
}
