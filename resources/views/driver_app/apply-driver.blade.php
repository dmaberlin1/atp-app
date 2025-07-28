<x-app-layout>
    <form method="POST" action="{{ route('driver-application.store') }}">
        @csrf
        <input name="name" required placeholder="Имя">
        <input name="email" type="email" required placeholder="Email">
        <textarea name="experience" placeholder="Опыт"></textarea>
        <button>Отправить</button>
    </form>
</x-app-layout>
