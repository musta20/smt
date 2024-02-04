<!DOCTYPE html>
<html dir="rtl" lang="ar">
<x-layout.head />
<body>

    <x-layout.header />
    <section class="px-14 " >  


        <main>

            {{$slot}}

        </main>
    </section>
    <x-layout.footer />
</body>