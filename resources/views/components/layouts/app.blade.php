<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite(['resources/js/test.js']) --}}
    @livewireStyles  
    <title>Document</title>
</head>
<body>
    <main class="px-10 py-10">
        {{ $slot }}
        {{-- @livewireScriptConfig --}}
        @livewireScripts
    </main>
</body>
</html>

