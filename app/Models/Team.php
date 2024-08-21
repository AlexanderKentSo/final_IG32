<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function histories() : HasMany {
        return $this->hasMany(History::class, 'team_id');
    }

    public function cards() : HasMany {
        return $this->hasMany(TeamCard::class, 'team_id');
    }

    public function mcContest() : HasOne
    {
        return $this->hasOne(McContest::class, 'team_id');
    }

    public function questions() : BelongsToMany
    {
        return $this->belongsToMany(
            McQuestion::class,
            'mc_submissions',
            'team_id',
            'mc_question_id'
        )
            ->withPivot(['answer', 'score'])
            ->withTimestamps();
    }
}
