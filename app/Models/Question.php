<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_id',
        'number',
        'question',
        'answer',
    ];

    public function board() : BelongsTo {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function letters() : BelongsToMany {
        return $this->belongsToMany(
            Letter::class,
            'directions',
            'question_id',
            'letter_id'
        )
            ->withPivot(['direction'])
            ->withTimestamps();
    }

    public function history() : HasOne {
        return $this->hasOne(History::class, 'question_id');
    }
}
