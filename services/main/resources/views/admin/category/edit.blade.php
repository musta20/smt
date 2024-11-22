<x-admin.partials.layout>


  <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
      {{ __('messages.Categories') }}
    </h2>

    <nav>
      <ol class="flex items-center gap-2">
        <li>
          <a class="font-medium" href="{{ route('admin.dashboard') }}"> / {{ __('messages.Dashboard') }} </a>
        </li>
        <li class="font-medium text-primary">{{ __('messages.categories') }}'</li>
      </ol>
    </nav>
  </div>

      <livewire:admin.edit-category :$category  />

</x-admin.partials.layout> 