<x-admin.partials.layout>
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          {{__('messages.Settings')}}
        </h2>
    
        <nav>
          <ol class="flex items-center gap-2">
            <li class="font-medium text-primary">{{__('messages.Settings')}}</li>
    
            <li>
              <a class="font-medium" href="{{route('admin.dashboard')}}"> / {{__('messages.Dashboard')}} </a>
            </li>
          </ol>
        </nav>
      </div>
<livewire:admin.store />

</x-admin.partials.layout>