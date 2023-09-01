<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Player;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      /*  $user1 = User::create([
            'name' =>'ali' ,
            'age' => 25 ,
            'email'=>'ali@gmail.com' ,
            'password'=> '123456789',
                'role'=> 'player'
        ]) ;
        $user2 = User::create([
            'name' =>'hashem' ,
            'age' => 25 ,
            'email'=>'hashem@gmail.com' ,
            'password'=> '123456789',
            'role'=> 'trainer'
        ]) ;
        $player = Player::create([
            'name' =>'ali' ,
            'age' => 25 ,
            'email'=>'ali@gmail.com' ,
        ]);
        $trainer = Trainer::create([
            'name' =>'hashem' ,
            'age' => 25 ,
            'email'=>'hashem@gmail.com' ,
        ]);


        */

       // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
