<x-app-layout>
    <div class="container">
        <h2>Настройки АТП</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('settings.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Название компании</label>
                <input type="text" name="company_name" class="form-control"
                       value="{{ old('company_name', $setting->company_name) }}" required>
            </div>

            <div class="mb-3">
                <label>Адрес</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address) }}">
            </div>

            <div class="mb-3">
                <label>Телефон</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone) }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}">
            </div>

            <div class="mb-3">
                <label>Часы работы</label>
                <input type="text" name="work_hours" class="form-control"
                       value="{{ old('work_hours', $setting->work_hours) }}">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

</x-app-layout>
