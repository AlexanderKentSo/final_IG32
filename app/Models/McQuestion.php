<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class McQuestion extends Model
{
    use HasFactory;

    protected $table = 'mc_questions';

    protected $fillable = [
        'number',
        'question',
        'answer'
    ];

    public function choices() : HasMany
    {
        return $this->hasMany(McChoice::class, 'mc_question_id');
    }

    public function teams() : BelongsToMany
    {
        return $this->belongsToMany(
            Team::class,
            'mc_submissions',
            'mc_question_id',
            'team_id'
        )
            ->withPivot(['answer', 'score'])
            ->withTimestamps();
    }
}
