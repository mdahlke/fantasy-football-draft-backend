<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftPick extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'team_id',
        'round',
        'pick_number',
    ];

    public function draft()
    {
        //        return $this->hasOne('dra')
    }

    public function player()
    {
        return $this->hasOne(Player::class, 'id', 'player_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
