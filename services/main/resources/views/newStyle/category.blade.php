<x-main-layout :page="$category->name">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

    @foreach ($category->products as $product)

    <x-newstyle::product-card :$product />

    @endforeach

  </div>


</x-main-layout>