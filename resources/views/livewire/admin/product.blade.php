<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    @vite('resources/js/flowbite.js')
    <div class="flex justify-between px-4 py-6 md:px-6 xl:px-7.5">
        <h4 class="text-xl font-bold text-black dark:text-white">Top Products</h4>




<form>
    <div class="flex">
        <button id="dropdown-button" 
        data-dropdown-toggle="dropdown"
         class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" 
         type="button">ترتيب حسب <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg></button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
            <li>
                <button type="button" 

                wire:click="sortby('NEWEST')"
                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الاحدث</button>
            </li>
            <li>
                <button type="button"                 wire:click="sortby('AVG_COUSTMER')"
                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الاعلى تقييما</button>
            </li>
            <li>
                <button type="button"                 wire:click="sortby('BEST_SELLING')"
                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الاكثر طلب</button>
            </li>
            <li>
                <button type="button" 
                wire:click="sortby('LOW_TO_HIGHT')"
                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">السعر: الاقل الى الاعلى</button>
            </li>

            <li>
                <button type="button" 
                wire:click="sortby('HIGHT_TO_LOW')"
                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">السعر: الاعلى الى الاقل</button>
            </li>
            </ul>
        </div>
  
    </div>
</form>






        
        <div class="flex">







            


            <select
                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                wire:model.live='categoryId' aria-labelledby="dropdown-button">
                <option value="" class=" bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    التصنيف
                </option>

                @foreach ($category as $item)
                <option class=" px-1 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                    wire:key="{{$item->id}}" value="{{$item->id}}">

                    {{$item->name}}
                </option>
                @endforeach
            </select>


            <form wire:submit="search" class="relative w-full">


                <input wire:model="query" wire:click='clear' type="search" id="search-dropdown"
                    class="block p-2.5 w-10/12 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-1 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="بحث" required>


                <button wire:submit="search"
                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">بحث</span>
                </button>
            </form>
        </div>
    </div>





    <div
        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
        <div class="col-span-3 flex items-center">
            <p class="font-medium">المنتج</p>
        </div>
        <div class="col-span-2 hidden items-center sm:flex">
            <p class="font-medium">التصنيف</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="font-medium">السعر</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="font-medium">التخفيض</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="font-medium">تعديل</p>
        </div>
    </div>
    @empty($products->first())
    <div
        class="flex justify-center border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
        <span class="py-5 px-5">
            لا يوجد بيانات


        </span>
    </div>
    @endempty

    @foreach ($products as $item)
    <div wire:key="{{ $item->id }}">


        <div
            class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
            <div class="col-span-3 flex items-center">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                    <div class="h-12.5 w-15 rounded-md">
                        <img src="{{$item->image}}" alt="Product" />
                    </div>
                    <p class="text-sm font-medium text-black dark:text-white">
                        {{$item->name}}
                    </p>
                </div>
            </div>
            <div class="col-span-2 hidden items-center sm:flex">
                <p class="text-sm font-medium text-black dark:text-white"> {{$item->category->name}}</p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-sm font-medium text-black dark:text-white">{{$item->price}}</p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-sm font-medium text-black dark:text-white">{{$item->discount}}</p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-sm font-medium text-meta-3">تعديل</p>
            </div>
        </div>
    </div>
    @endforeach
    <hr>
    <div dir="ltr" class="p-2">
        {{$products->links()}}
    </div>
</div>