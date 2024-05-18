<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VotingUser extends Model
{
    use HasFactory;

    protected $fillable = ['voting_id', 'user_id'];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(Voting::class, 'voting_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
