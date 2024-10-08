<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'question_id'
    ];

    public function question() : BelongsTo {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function teams() : BelongsTo {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
