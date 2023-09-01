<div class="main-container">
    <form action="/login" method="post" class="space-y-4">
        @csrf
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
        <div class="input">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
        </div>
    </form>
</div>
