<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_id',
        'row',
        'col',
        'show',
        'letter',
        'head_number'
    ];

    public function board() : BelongsTo {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function questions() : BelongsToMany {
        return $this->belongsToMany(
            Question::class,
            'directions',
            'letter_id',
            'question_id'
        )
            ->withPivot(['direction'])
            ->withTimestamps();
    }
}
