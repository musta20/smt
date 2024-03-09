<x-main-layout>

  @if ($CarouselImage && $visible->showCarousel)

  <x-newstyle::layout.slide :$CarouselImage />

  @endif

  <section class="bg-white py-8">
    <hr />

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">


      @foreach ($products as $product)

      <x-newstyle::product-card :$product />
   
      @endforeach



    </div>

  </section>



  </div>


</x-main-layout>