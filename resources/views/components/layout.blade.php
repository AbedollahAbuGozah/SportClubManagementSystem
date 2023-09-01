<!-- master.blade.php -->

@props(['role'])

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport club management</title>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">
<nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center">
    <h1 class="text-xl font-bold">Sport club management</h1>
    @if($role == 'guest')
        <div>
            <a href="/register" class="text-white hover:underline ml-4">Register</a>
            <a href="/login" class="text-white hover:underline ml-4">Login</a>
        </div>
    @endif

    @if($role == 'geustReg')
        <a href="/login" class="text-white hover:underline ml-4">Login</a>
    @endif

    @if($role == 'geustLog')
        <a href="/register" class="text-white hover:underline ml-4">Register</a>
    @endif
    @if($role == 'trainer')
        <a href="/dashboard-trainer" class="text-white hover:underline ml-4">Dashboard</a>
    @endif

    @if($role == 'trainer' || $role == 'player')
        <div>
            <span class="mr-4">Welcome, {{ Auth::user()->name }}</span>
            <a href="/logout" class="text-white hover:underline">Logout</a>
        </div>
    @endif

    @if($role != 'trainer' && $role != 'player')
        <div>

            <a href="/" class="text-white hover:underline">Home</a>
        </div>
    @endif
</nav>

<main class="flex-1 p-6">
    {{$slot}}
</main>

<footer class="bg-gray-800 text-white text-center py-4">
    © 2023 Sport Club Management. All rights reserved.
</footer>
</body>

</html>
