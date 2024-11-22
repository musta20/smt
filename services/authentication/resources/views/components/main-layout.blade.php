@props(['page'=>''])
<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
 dir="{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}"
 >

<x-layout.head  :$page/>
<body class="bg-slate-50 font-Cairo">
    <x-layout.header :logo="$logo"/>

    <section class="px-14 ">
        <main> {{ $slot }} </main>
    </section>
    <x-layout.footer />
</body>
</html>