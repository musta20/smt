<x-main-layout>

  <div class="grid lg:grid-cols-4 gap-2 py-5 sm:grid-cols-1 md:grid-cols-3">

    @foreach ($category->products as $product)

    <x-product-card :$product />

    @endforeach

  </div>


</x-main-layout>