<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $player = Player::where('email', $user->email)->first();
        if ($user->role == 'player') {

            return view('playerInfo', [
                'currentPlayer' => $player,
                'games' => $player->games,
                'role' => 'player'
            ]);


        } else redirect('dashboard-trainer');
    }

}


