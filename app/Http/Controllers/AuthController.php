<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\Trainer;
use App\Models\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {

        if (Auth::check()) {

            if(session('role') == 'player')return redirect('player-info');
            else return redirect('dashboard-trainer');
        }
        return view('welcome',[
            'role' => 'guest'

        ]);
    }

    public function showLogin()
    {
        if (Auth::check()) {

            if(session('role') == 'player')return redirect('player-info');
            else return redirect('dashboard-trainer');
        }
        return view('login', [
            'role' => 'geustLog'

        ]) ;
    }
    public function showRegister()
    {

        if (Auth::check()) {

            if(session('role') == 'player')return redirect('player-info');
            else return redirect('dashboard-trainer');
        }
        return view('register', [
            'role' => 'geustReg'

        ]) ;
    }

    public function login ()
    {
        if (Auth::check()) {

            if(session('role') == 'player')return redirect('player-info');
            else return redirect('dashboard-trainer');
        }
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);



        $user = User::where('email' , $attributes['email'])->first() ;

        if (auth()->attempt($attributes)) {


            $player = Player::where('email' , $attributes['email'])->first() ;
            session(['role' => $user->role]);
            session(['email' => $user->email]);
            session(['id' => $user->id]);
            if($user->role == 'player'){
                session(['id2' => $player->id]);
                return redirect('player-info');}
            else {
                $trainer = Trainer::where('email' , $attributes['email'])->first() ;

                session(['id2' => $trainer->id]);
               return redirect('/dashboard-trainer');
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }

    public function register()
    {
        if (Auth::check()) {

            if(session('role') == 'player')return redirect('player-info');
            else return redirect('dashboard-trainer');
        }
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

        if(request('role') =='player') {
            $user = new Player();
            $user->name = $attribute['name'];
            $user->age = $attribute['age'];
            $user->email = $attribute['email'];
            $user->save() ;
        }
        else
        {
            $user = new Trainer();
            $user->name = $attribute['name'];
            $user->age = $attribute['age'];
            $user->email = $attribute['email'];
            $user->save() ;
        }
        return redirect('/login');
    }
    public function logout()
    {

        auth()->logout();
         return redirect('/');
    }

}
