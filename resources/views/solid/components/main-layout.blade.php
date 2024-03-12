@props(['page'=>''])
<!DOCTYPE html>
<html 
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
 dir="{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}"
 >

<x-layout.head :$page />

    <body  class="bg-secondarylight font-IBMP    text-gray-600 work-sans leading-normal text-base tracking-normal">
        <x-layout.header :logo="$logo"/>
        
        <main  class="py-8 w-4/5 m-auto"  > {{$slot}} </main>
    </body>

    <x-layout.footer />

</html>