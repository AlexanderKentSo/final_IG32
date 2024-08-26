<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinalModel extends Model
{
    use HasFactory;

    protected $table = 'finals';

    protected $fillable = [
        'team_id',
        'strategy_id',
        'hpp',
        'laba_kotor',
        'laba_bersih',
        'target_cost'
    ];

    public function team() : BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function strategy() : BelongsTo
    {
        return $this->belongsTo(Strategy::class, 'strategy_clas');
    }
}
