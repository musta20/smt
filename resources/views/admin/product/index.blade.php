<x-admin.partials.layout>

  <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
      {{__('Products')}}
    </h2>

    <nav>
      <ol class="flex items-center gap-2">
        <li class="font-medium text-primary">{{__('products')}}</li>

        <li>
          <a class="font-medium" href="{{route('admin.dashboard')}}"> / {{__('Dashboard')}} </a>
        </li>
      </ol>
    </nav>
  </div>

      <livewire:admin.product   />

</x-admin.partials.layout> 