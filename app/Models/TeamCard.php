<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'team_id'
    ];

    public function card() : BelongsTo {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function team() : BelongsTo {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
