<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function picks()
    {
        return $this->hasMany(DraftPick::class)->with('team')->with('player');
    }
}
