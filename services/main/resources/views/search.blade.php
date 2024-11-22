<x-main-layout :page="__('messages.Search')" :SearchBox="true" >

    @vite('resources/js/test.js')

    <livewire:search :keyword="$search" />

    @livewireScriptConfig
</x-main-layout>