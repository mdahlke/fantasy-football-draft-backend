<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function picks(){
        return $this->hasManyThrough(Player::class, DraftPick::class, 'team_id', 'id', 'id', 'player_id');
    }
}
