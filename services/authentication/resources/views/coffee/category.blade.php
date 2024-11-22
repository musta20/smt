<x-main-layout :page="$category->name">
  <x-coffee::layout.nav />

  <div class="container w-4/5 m-auto flex items-center flex-wrap pt-4 pb-12">

    @foreach ($category->products as $product)

    <x-newstyle::product-card :$product />

    @endforeach

  </div>


</x-main-layout>