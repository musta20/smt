<x-main-layout :SearchBox="true" >

    @vite('resources/js/test.js')

    <livewire:search :keyword="$search" />

    @livewireScriptConfig
</x-main-layout>