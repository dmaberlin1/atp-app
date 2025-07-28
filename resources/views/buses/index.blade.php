<x-app-layout>
    <h1 class="text-xl font-bold">Автобусы</h1>
    <a href="{{ route('buses.create') }}">Добавить автобус</a>

    <ul>
        @foreach($buses as $bus)
            <li>
                Номер: {{ $bus->number_plate }},
                Марка: {{ $bus->brand->name }},
                Водитель: {{ $bus->driver?->full_name ?? '—' }}

                <a href="{{ route('buses.edit', $bus) }}">Редактировать</a>

                <form method="POST" action="{{ route('buses.destroy', $bus) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
