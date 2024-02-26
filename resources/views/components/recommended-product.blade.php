<div class="grid lg:grid-cols-6 gap-2 py-5 sm:grid-cols-1 md:grid-cols-3">
 
  @foreach ($recomendedProduct as $product)

  <x-small-product-card :$product />
      
  @endforeach
  </div>