<div>
    <div class=" bg-gray-50 border h-40 border-gray-200 m-5  shadow">
        <div class="w-full flex justify-evenly px-4 py-6  md:px-6 xl:px-7.5 ">

            <div x-data="{ isOpen: false }"
                class="relative divide-y divide-gray-3  border border-gray-3 shadow w-1/4 dark:bg-gray-700">
                <button @click.prevent="isOpen = !isOpen"
                    class="w-full inline-flex items-center gap-1.5  justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
                    {{__('messages.order by')}}
                    <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.00039 11.4C7.85039 11.4 7.72539 11.35 7.60039 11.25L1.85039 5.60005C1.62539 5.37505 1.62539 5.02505 1.85039 4.80005C2.07539 4.57505 2.42539 4.57505 2.65039 4.80005L8.00039 10.025L13.3504 4.75005C13.5754 4.52505 13.9254 4.52505 14.1504 4.75005C14.3754 4.97505 14.3754 5.32505 14.1504 5.55005L8.40039 11.2C8.27539 11.325 8.15039 11.4 8.00039 11.4Z"
                            fill=""></path>
                    </svg>
                </button>

                <div @click.outside="isOpen = false" x-show="isOpen"
                    class="absolute right-0 top-full z-1  w-full  rounded-t-none bg-white py-2.5  shadow"
                    style="display: none;">
                    <button wire:click="filter('sortType','NEWEST'); isOpen = false"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        {{__('messages.newest')}}
                    </button>
                    <button wire:click="filter('sortType','AVG_COUSTMER'); isOpen = false"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        {{__('messages.average customer')}}
                    </button>
                    <button wire:click="filter('sortType','BEST_SELLING'); isOpen = false"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        {{__('messages.highest order')}}
                    </button>

                    <button wire:click="filter('sortType','LOW_TO_HIGHT'); isOpen = false"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        {{__('messages.Price: low to high')}}
                    </button>

                    <button wire:click="filter('sortType','HIGHT_TO_LOW'); isOpen = false"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        {{__('messages.Price: high to low')}}
                    </button>
                
                  
                </div>
            </div>

            <div class="flex w-1/4 relative  ">

                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <button wire:click="searchWord">
                        <svg class="h-5 w-5 text-gray-500 " viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </button>
                </span>

                <input name="search" wire:model='searchword' placeholder="بحث" required
                    class="w-full border  pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                    type="text">





            </div>

            <div x-data="{ isOpen: false }"
                class="relative divide-y w-1/4  divide-gray-3 border border-gray-3 rounded-s-lg shadow dark:bg-gray-700">
                <button @click.prevent="isOpen = !isOpen"
                    class="w-full inline-flex items-center gap-1.5  justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
                    {{__('messages.category')}}
                    <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.00039 11.4C7.85039 11.4 7.72539 11.35 7.60039 11.25L1.85039 5.60005C1.62539 5.37505 1.62539 5.02505 1.85039 4.80005C2.07539 4.57505 2.42539 4.57505 2.65039 4.80005L8.00039 10.025L13.3504 4.75005C13.5754 4.52505 13.9254 4.52505 14.1504 4.75005C14.3754 4.97505 14.3754 5.32505 14.1504 5.55005L8.40039 11.2C8.27539 11.325 8.15039 11.4 8.00039 11.4Z"
                            fill=""></path>
                    </svg>
                </button>

                <div @click.outside="isOpen = false" x-show="isOpen"
                    class="absolute right-0 top-full z-1 shadow w-full border border-gray-3 rounded-[5px] bg-white py-2.5 dark:bg-boxdark "
                    style="display: none;">

                    @foreach ($category as $item)
                    <button
                        class="flex w-full px-4 py-4 justify-center text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4"
                        wire:key="{{$item->id}}" wire:click="filter('categoryId','{{$item->id}}'); isOpen = false">

                        {{$item->name}}
                    </button>
                    @endforeach



                </div>
            </div>

        </div>
        <span class="m-3 p-4 text-stone-600">
            {{__('messages.Total')}} ({{count($allProducts)}}) {{__('messages.product')}}
        </span>
        <div class="  border-stroke px-4 py-2 dark:border-strokedark sm:grid-cols-9 md:px-6 2xl:px-7.5">
            @empty(!$searchword)
            <span id="badge-dismiss-default"
                class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                {{$searchword}}
                <button type="button" wire:click="clear"
                    class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300"
                    data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                    <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>

                </button>
            </span>
            @endempty


            @foreach ($filters as $key => $item)

            @empty(!$item)
            <span id="badge-dismiss-default"
                class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                {{$key =='categoryId' ? $category->find($item)->name:__('messages.'.$item)}}

                <button type="button" wire:click="filter('{{$key}}','')"
                    class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300"
                    data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                    <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>

                </button>
            </span>
            @endempty
            @endforeach

        </div>

    </div>

    <div dir="ltr" class="p-2 flex justify-center ">
        {{$allProducts->links()}}
    </div>
    <div class="grid lg:grid-cols-4 gap-10 py-5 sm:grid-cols-1 md:grid-cols-3">

        @foreach ($allProducts as $product)

        <x-coffee::product-card :$product />

        @endforeach

    </div>


</div>