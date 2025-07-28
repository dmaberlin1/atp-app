<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Bus Fleet Management') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">
            <a href="{{ url('/') }}">АТП</a>
        </h1>
        <nav class="space-x-4">
            <a href="{{ route('drivers.index') }}" class="text-blue-600 hover:underline">Водители</a>
            <a href="{{ route('buses.index') }}" class="text-blue-600 hover:underline">Автобусы</a>
            <a href="{{ route('brands.index') }}" class="text-blue-600 hover:underline">Марки</a>
            <a href="{{ route('former-drivers.index') }}" class="text-blue-600 hover:underline">История</a>
            <a href="{{ route('settings.edit') }}" class="text-blue-600 hover:underline">Настройки</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow p-4 text-center text-sm text-gray-500">
        &copy; {{ now()->year }} АТП. Все права защищены.
    </footer>
</div>

</body>
</html>
