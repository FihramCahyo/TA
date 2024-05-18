<?php

namespace App\Models;

use App\Http\Controllers\VotingController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voting extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'image_path',
    ];

    public function voting(): HasMany
    {
        return $this->hasMany(VotingUser::class, 'voting_id', 'id');
    }

    public function makanans()
    {
        return $this->hasMany(Makanan::class, 'restaurant_name', 'restaurant_name');
    }
}
