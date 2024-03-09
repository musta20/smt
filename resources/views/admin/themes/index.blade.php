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
    <div x-ref='form' method="post" action="{{route('admin.themes.store')}}" class="bg-white p-5 flex justify-center gap-4">
        @csrf
        @foreach ($themes as $item)
        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
              <img src="asset_tenant()" />  
              {{$item}}</label>
        </div>
        @endforeach
    </div>  
  </x-admin.partials.layout>