<x-app-layout>
    <h1>Редактировать водителя</h1>

    <form method="POST" action="{{ route('drivers.update', $driver) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>ФИО</label>
            <input type="text" name="full_name" value="{{ old('full_name', $driver->full_name) }}" required>
        </div>

        <div>
            <label>Дата рождения</label>
            <input type="date" name="birth_date" value="{{ old('birth_date', $driver->birth_date) }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $driver->email) }}" required>
        </div>

        <div>
            <label>Зарплата</label>
            <input type="number" name="salary" value="{{ old('salary', $driver->salary) }}" required>
        </div>

        <div>
            <label>Фото</label>
            <input type="file" name="photo">
            @if($driver->photo)
                <img src="{{ asset('storage/' . $driver->photo) }}" alt="Фото" width="100">
            @endif
        </div>

        <button type="submit">Обновить</button>
    </form>
</x-app-layout>
