<x-app-layout>
    <h1>Добавить водителя</h1>

    <form method="POST" action="{{ route('drivers.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label>ФИО</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}" required>
        </div>

        <div>
            <label>Дата рождения</label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Зарплата</label>
            <input type="number" name="salary" value="{{ old('salary') }}" required>
        </div>

        <div>
            <label>Фото</label>
            <input type="file" name="photo">
        </div>

        <button type="submit">Сохранить</button>
    </form>
</x-app-layout>
