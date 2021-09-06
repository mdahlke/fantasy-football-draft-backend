<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function draft(){
        return $this->belongsTo(Draft::class);
    }
    public function pick(){
        return $this->belongsTo(DraftPick::class, 'id', 'player_id');
    }
}
