<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public function players()
    {
          return $this->belongsToMany(Player::class , 'player-game' , 'game_id' , 'player_id') ;
    }
    public function trainers()
    {
        return $this->belongsTo(Trainer::class,'trainer_id' , 'id' ) ;
    }
    protected $guarded =['id'] ;

}
