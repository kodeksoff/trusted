<x-layout>
    <x-slot name="title">
        Регистрация нового пользователя
    </x-slot>
    <x-breadcrumbs title="Регистрация" />
    <register-page
        route="{{ route('register') }}"
    >
    </register-page>
</x-layout>
