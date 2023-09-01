@props(['players'])
<div class="main-container p-6">
    @if(session('successes'))
        <div class="success-message bg-green-200 text-green-700 px-4 py-2 mb-4 rounded-lg">
            {{ session('successes') }}
        </div>
    @endif
    <form action="/create-match" method="post" class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        @csrf
        <div class="input mb-4">
            <label for="date" class="block text-gray-700 font-semibold mb-2">Date:</label>
            <input id="date" name="date" type="text" value="{{ old('date') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('date')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="input mb-4">
            <label for="player1" class="block text-gray-700 font-semibold mb-2">First player:</label>
            <select name="player1" id="player1">
                @foreach($players as $player)
                    <option value="{{$player->id}}">{{$player->name}}</option>
                @endforeach
            </select>
            @error('player1')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="input mb-4">
            <label for="player2" class="block text-gray-700 font-semibold mb-2">Second player:</label>
            <select name="player2" id="player2">
                @foreach($players as $player)
                    <option value="{{$player->id}}">{{$player->name}}</option>
                @endforeach
            </select>            @error('player2')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="trainer" value="{{ session('id2') }}">
        <div class="submit">
            <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </form>
</div>
