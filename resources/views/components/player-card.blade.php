@props(['currentPlayer', 'games'])

<div class="mai-container">
    <div class="player-info bg-gray-100 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Player Information</h2>
        <div class="flex flex-col space-y-2">
            <span class="text-lg font-semibold">Name: {{$currentPlayer->name}}</span>
            <span class="text-lg font-semibold">Email: {{$currentPlayer->email}}</span>
            <span class="text-lg font-semibold">Age: {{$currentPlayer->age}}</span>
        </div>
    </div>

    <div class="player-match mt-6">
        @if($games && $games->count())
            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100">Date</th>
                    <th class="px-4 py-2 bg-gray-100">Added By</th>
                    <th class="px-4 py-2 bg-gray-100">VS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <td class="border px-4 py-2">{{$game->date}}</td>
                        <td class="border px-4 py-2">{{$game->trainers->name}}</td>
                        <td class="border px-4 py-2">
                            @if($game->players[0]->id == $currentPlayer->id)
                                {{$game->players[1]->name}}
                            @else
                                {{$game->players[0]->name}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-red-500 mt-4">No games found.</p>
        @endif
    </div>
</div>
