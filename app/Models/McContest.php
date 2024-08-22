<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class McContest extends Model
{
    use HasFactory;

    protected $table = 'mc_contests';

    protected $fillable = [
        'team_id',
        'total_score',
        'waktu_kumpul',
        'waktu_selesai'
    ];

    public function team() : BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
