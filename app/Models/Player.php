<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public function games()
    {
        return $this->belongsToMany(Game::class , 'player-game' , 'player_id','game_id'  ) ;
    }
    protected $guarded =['id'] ;

}
