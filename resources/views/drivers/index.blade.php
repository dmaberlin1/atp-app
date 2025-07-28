<x-app-layout>
    <h1>Водители</h1>
    <a href="{{ route('drivers.create') }}">Добавить</a>

    <ul>
        @foreach($drivers as $driver)
            <li>
                {{ $driver->full_name }} ({{ \Carbon\Carbon::parse($driver->birth_date)->age }} лет)
                <a href="{{ route('drivers.edit', $driver) }}">Редактировать</a>
                <form method="POST" action="{{ route('drivers.destroy', $driver) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
