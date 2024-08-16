<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;
    protected $fillable = [
        'board'
    ];

    public function questions() : HasMany {
        return $this->hasMany(Question::class, 'board_id');
    }

    public function letters() : HasMany {
        return $this->hasMany(Letter::class, 'board_id');
    }
}
