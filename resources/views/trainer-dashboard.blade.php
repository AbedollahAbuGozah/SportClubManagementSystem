<x-layout :role="$role">
    <div class="main-container py-6">
        <div class="table">
            <table class="w-full border-collapse">
                <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Age</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($players->count())
                    @foreach($players as $player)
                        <tr class="border-b border-gray-300">
                            <td class="py-2 px-4">{{ $player->id }}</td>
                            <td class="py-2 px-4">{{ $player->name }}</td>
                            <td class="py-2 px-4">{{ $player->age }}</td>
                            <td class="py-2 px-4">
                                <a href="/delete/{{$player->id}}" class="text-red-500 hover:text-red-700">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="flex justify-center mt-6">
            <a href="/create-match" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mr-4 focus:outline-none focus:ring-2 focus:ring-blue-500">Create match</a>
            <a href="/add-player" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">Add player</a>
        </div>
    </div>
</x-layout>
