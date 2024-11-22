<x-main-layout :page="__('messages.Search')" :SearchBox="true">

    <x-coffee::layout.nav />

    @vite('resources/js/test.js')
    <div class="w-4/5 mx-auto">
        <livewire:search :keyword="$search" />
    </div>
    @livewireScriptConfig

</x-main-layout>