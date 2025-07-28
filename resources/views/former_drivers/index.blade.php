<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Архив уволенных водителей
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($formerDrivers->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Имя</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Зарплата</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата найма</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата увольнения</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($formerDrivers as $driver)
                            <tr>
                                <td class="px-4 py-2">{{ $driver->name }}</td>
                                <td class="px-4 py-2">{{ $driver->email }}</td>
                                <td class="px-4 py-2">{{ number_format($driver->salary, 2) }} ₴</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($driver->hired_at)->format('d.m.Y') }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($driver->fired_at)->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Нет уволенных водителей.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
