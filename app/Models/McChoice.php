<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class McChoice extends Model
{
    use HasFactory;
    protected $table = 'mc_choices';

    protected $fillable = [
        'mc_question_id',
        'alphabet',
        'choice'
    ];

    public function question() : BelongsTo
    {
        return $this->belongsTo(McQuestion::class, 'mc_question_id');
    }
}
