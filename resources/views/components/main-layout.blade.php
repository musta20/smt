<!DOCTYPE html>
<html dir="rtl" lang="ar">
<x-layout.head />
<body class="bg-slate-50">
    <x-layout.header :logo="$logo"/>
    <section class="px-14 ">
        <main> {{$slot}} </main>
    </section>
    <x-layout.footer />
</body>