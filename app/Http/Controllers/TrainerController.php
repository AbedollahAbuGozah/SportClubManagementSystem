<?php
namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Player;
use App\Models\PlayerGame;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class TrainerController extends Controller
{

    public function show()
    {
        if(session('role') != 'trainer')return redirect('player-info') ;
        return view('trainer-dashboard', [
            'players' =>Player::all(),
            'role'=> 'trainer'

        ]) ;
    }
    public function ShowCreatForm()
    {
        if(session('role') != 'trainer')return redirect('player-info') ;
        $players = Player::all() ;
        return view('create-match' ,[
                'role' => 'trainer' ,
                'players'=> $players
            ]
        ) ;
    }
    public function creatMatch(){
        if(session('role') != 'trainer')return redirect('player-info') ;

        $values = request()->validate([
            'player1' => 'required|exists:players,id|different:player2',
            'player2' => 'required|exists:players,id',
            'date' => 'required',
            'trainer' => 'required'
        ]);
        $formattedDate = Carbon::createFromFormat('d-m-Y', $values['date'])->format('Y-m-d');

        $g = Game::create([
            'date' => $formattedDate,
            'trainer_id' => $values['trainer']
        ]);

        PlayerGame::create(['player_id'=> $values['player1'] , 'game_id' => $g->id]);
        PlayerGame::create(['player_id'=> $values['player2'] , 'game_id' => $g->id]);
        return redirect('create-match')->with('successes' , 'The match added successfully') ;
    }
    public function showAddForm()
    {
        if(session('role') != 'trainer')return redirect('player-info') ;

        return view ('add-player',[
            'role' => 'trainer'
            ]);
    }
    public function add()
    {
        if(session('role') != 'trainer')return redirect('player-info') ;

        $attribute = request()->validate(
            [
                'name'=>'required|min:1|max:255',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:8',
                'age'=>'required' ,
                'role'=>'required',
            ]
        );
        $attribute['password'] = bcrypt($attribute['password']) ;
        User::create($attribute) ;
            $user = new Player();
            $user->name = $attribute['name'];
            $user->age = $attribute['age'];
            $user->email = $attribute['email'];
            $user->save() ;
       return  redirect('add-player')->with('successes' , 'The player added successfully');

    }
    public function delete(Player $player)
    {
        if(session('role') != 'trainer')return redirect('player-info') ;
        User::find($player->id)->delete() ;
        $player->delete();
        return redirect('dashboard-trainer');
    }


}
