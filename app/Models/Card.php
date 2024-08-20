<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'type'
    ];

    public function team() : HasOne {
        return $this->hasOne(TeamCard::class, 'card_id');
    }
}
