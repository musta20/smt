<x-main-layout  >


  @if ($CarouselImage && $visible->showCarousel)

  <x-layout.slide :$CarouselImage />

  @endif


  <div class="grid lg:grid-cols-4 gap-10 py-5 sm:grid-cols-1 md:grid-cols-3">

    @foreach ($products as $product)

    <x-product-card :$product />

    @endforeach

  </div>


</x-main-layout>