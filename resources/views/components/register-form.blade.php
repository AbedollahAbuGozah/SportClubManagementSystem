<div class="main-container">
    <h1 class="text-3xl font-bold mb-4">Register Form</h1>
    <form method="post" action="/register" class="space-y-4">
        @csrf
        <div class="input flex flex-col">
            <label for="name" class="text-lg font-semibold mb-2">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="input flex flex-col">
            <label for="email" class="text-lg font-semibold mb-2">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="input flex flex-col">
            <label for="password" class="text-lg font-semibold mb-2">Password:</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="input flex flex-col">
            <label for="age" class="text-lg font-semibold mb-2">Age:</label>
            <input type="text" id="age" name="age" value="{{ old('age') }}" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('age')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="role" class="text-lg font-semibold mb-2">Select your role:</label>
            <select id="role" name="role" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="player">Player</option>
                <option value="trainer">Trainer</option>
            </select>
        </div>

        <div class="submit">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
        </div>
    </form>
</div>
