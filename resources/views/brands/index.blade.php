<x-app-layout>
    <h1 class="text-xl font-bold">Марки автобусов</h1>
    <a href="{{ route('brands.create') }}">Добавить марку</a>

    <ul>
        @foreach($brands as $brand)
            <li>
                {{ $brand->name }}
                <a href="{{ route('brands.edit', $brand) }}">Редактировать</a>
                <form method="POST" action="{{ route('brands.destroy', $brand) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
