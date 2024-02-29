<div class="grid lg:grid-cols-4 gap-2 py-5 sm:grid-cols-1 md:grid-cols-3">

    <div class="flex justify-between px-4 py-6 md:px-6 xl:px-7.5">
        <h4 class="relative divide-y divide-gray-3 rounded-lg border border-gray-3 shadow w-30 dark:bg-gray-700">

            <a href="{{route('admin.product.create')}}"
                class="w-full inline-flex items-center gap-1.5 rounded-md justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">

                إضافة

                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg></a>

        </h4>
        <div x-data="{ isOpen: false }"
            class="relative divide-y divide-gray-3 rounded-lg border border-gray-3 shadow w-55 dark:bg-gray-700">
            <button @click.prevent="isOpen = !isOpen"
                class="w-full inline-flex items-center gap-1.5 rounded-md justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
                ترتيب حسب
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
                    الاحدث
                </button>
                <button wire:click="filter('sortType','AVG_COUSTMER'); isOpen = false"
                    class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                    الاعلى تقييما
                </button>
                <button wire:click="filter('sortType','BEST_SELLING'); isOpen = false"
                    class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                    الاكثر طلبا
                </button>

                <button wire:click="filter('sortType','LOW_TO_HIGHT'); isOpen = false"
                    class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                    السعر: من الاقل الى الاعلى
                </button>

                <button wire:click="filter('sortType','HIGHT_TO_LOW'); isOpen = false"
                    class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                    السعر: من الاعلى الى الاقل
                </button>
                <button wire:click="filter('sortType','PUBLISHED'); isOpen = false"
                    class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                    حالة:منشور
                </button>
                <button wire:click="filter('sortType','DRAFT'); isOpen = false"
                    class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                    حالة:مسودة
                </button>
            </div>
        </div>
        <div class="flex">
            <div x-data="{ isOpen: false }"
                class="relative divide-y divide-gray-3 border border-gray-3 rounded-s-lg shadow w-35 dark:bg-gray-700">
                <button @click.prevent="isOpen = !isOpen"
                    class="w-full inline-flex items-center gap-1.5 rounded-md justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
                    التصنيف
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

            <div class="flex">


                <input type="search" wire:model='searchword' id="search-dropdown"
                    class=" p-2.5 w-50 z-20 text-sm text-gray-900 bg-gray-50  border border-gray-3  shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="بحث" required>


                <button type="submit" wire:click="search"
                    class=" top-0   p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">البحث اسم المنتج</span>
                </button>
            </div>
        </div>
    </div>
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
            {{$key =='categoryId' ? $category->find($item)->name:__($item)}}
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
    <h1>hihih</h1>
    @foreach ($products as $product)

    <x-product-card :$product />

    @endforeach

</div>