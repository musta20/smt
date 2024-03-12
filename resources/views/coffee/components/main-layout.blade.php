@props(['page'=>''])
<!DOCTYPE html>
<html 
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
 dir="{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}">
<x-layout.head :$page />
    <body class="bg-light font-IBMP  text-gray-600 work-sans leading-normal text-base tracking-normal">
        <x-layout.header :logo="$logo"/>
        
        <main    > {{$slot}} </main>
    </body>

    <x-layout.footer />

</html>