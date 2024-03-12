<x-admin.partials.layout>
  <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
      {{__('messages.Themes')}}
    </h2>
    <nav>
      <ol class="flex items-center gap-2">
        <li class="font-medium text-primary">{{__('messages.Themes')}}</li>
        <li>
          <a class="font-medium" href="{{route('admin.dashboard')}}"> / {{__('messages.Dashboard')}} </a>
        </li>
      </ol>
    </nav>
  </div>
  <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
           {{__('messages.Themes')}}
        </h3>
    </div>
  <form  method="post" action="{{route('admin.updateTheme')}}">
    @method('put')
    @csrf
    <div class="bg-white p-5 flex justify-center gap-4">

    @foreach ($themes as $item)
    <div class="flex items-center  border rounded border-slate-400 hover:shadow-lg">
      <label for="theme-1" class="w-full flex flex-col justify-center justify-items-center py-1 ms-2 text-sm font-medium 
      text-gray-900 dark:text-gray-300">
        <img class="h-60 w-80" src="{{ Vite::asset('resources/images/themes/'.$item->value.'.png')}}" />
        <div class="flex justify-items-center justify-center gap-2 m-2" >
         <div class=""> {{$item}}</div>
        <input id="theme-1" 

        @if (!tenant()->theme && $item->value=='Default')
       
        checked         
        
        @elseif ($item->value == tenant()->theme )
        checked
        @endif type="radio" value="{{$item->value}}" name="theme"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600
        dark:ring-offset-gray-800
        focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
      </div>
      </label>
    </div>
    @endforeach
    </div>
    <button type="submit" class="text-white m-2  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
    focus:ring-green-300 font-medium  text-sm px-5 py-2.5 text-center me-2 mb-2
    ">{{__('messages.publish')}}</button>
  </form>


  </div>
</x-admin.partials.layout>