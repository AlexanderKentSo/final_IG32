<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Strategy extends Model
{
    use HasFactory;

    protected $table = 'strategies';

    protected $fillable = [
        'number',
        'strategy',
        'term',
        'condition'
    ];

    public function teams() : HasMany
    {
        return $this->hasMany(FinalModel::class, 'strategy_id');
    }
}
