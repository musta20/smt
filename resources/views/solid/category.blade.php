<x-main-layout :page="$category->name">

  <div class="grid lg:grid-cols-4 gap-10 py-5 sm:grid-cols-1 md:grid-cols-3">

    @foreach ($category->products as $product)

    <x-solid::product-card :$product />

    @endforeach

  </div>


</x-main-layout>