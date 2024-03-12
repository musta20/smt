<x-main-layout>

  @if ($CarouselImage && $visible->showCarousel)

  <x-coffee::layout.slide :$CarouselImage />

  @endif
  <x-coffee::layout.nav />

  <section class="py-8 w-4/5 m-auto">

    <div class="grid lg:grid-cols-4 gap-10 py-5 sm:grid-cols-1 md:grid-cols-3">

      @foreach ($products as $product)

      <x-coffee::product-card :$product />
   
      @endforeach

    </div>

  </section>

  </div>


</x-main-layout>