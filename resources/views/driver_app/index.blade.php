<x-app-layout>
    @foreach ($applications as $app)
        <div>{{ $app->name }} - {{ $app->email }} - {{ $app->experience }}</div>
    @endforeach
</x-app-layout>
