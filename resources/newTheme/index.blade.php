<x-layout.layout>

  <h1>Hi Iam the new Theme and Its working</h1>

  <div class="grid lg:grid-cols-4 gap-2 py-5 sm:grid-cols-1 md:grid-cols-3">
    @for ($i = 0; $i < 10; $i++)
    
     <x-product />

    @endfor
  </div>


</x-layout.layout>