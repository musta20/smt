<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    {{-- @vite('resources/js/flowbite.js') --}}
    <div class="flex justify-between px-4 py-6 md:px-6 xl:px-7.5">
        <h4 
        
        class="relative divide-y divide-gray-3 rounded-lg border border-gray-3 shadow w-30 dark:bg-gray-700"
        >

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


    <div
        class="grid grid-cols-9 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-9 md:px-6 2xl:px-7.5">

        <div class="col-span-2 flex items-center">
            <p class="font-medium">المنتج</p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="font-medium">التصنيف</p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="font-medium">السعر</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="font-medium">التخفيض</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="font-medium">عدد الطلبات</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="font-medium"> التقييم</p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="font-medium">تاريخ الانشاء</p>
        </div>

        <div class="col-span-1 flex justify-center">
            <p class="font-medium">تعديل</p>
        </div>
    </div>
    @empty($allProducts->first())
    <div
        class="flex justify-center border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
        <span class="py-5 px-5">
            لا يوجد بيانات


        </span>
    </div>
    @endempty

    <x-modal>
        <span class="mx-auto inline-block">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.1" width="60" height="60" rx="30" fill="#DC2626"></rect>
                <path
                    d="M30 27.2498V29.9998V27.2498ZM30 35.4999H30.0134H30ZM20.6914 41H39.3086C41.3778 41 42.6704 38.7078 41.6358 36.8749L32.3272 20.3747C31.2926 18.5418 28.7074 18.5418 27.6728 20.3747L18.3642 36.8749C17.3296 38.7078 18.6222 41 20.6914 41Z"
                    stroke="#DC2626" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <h3 class="mt-5.5 p-5 text-xl font-bold text-black dark:text-white sm:text-2xl">

            : هل انت متاكد من حذف المنتج

            <p >
                {{$CurrentProduct->name ?? ""}}
            </p>
        </h3>


        <form method="post" action="{{ route('admin.product.destroy',$CurrentProduct->id ?? "") }}"
            class="-mx-3 flex flex-wrap gap-y-4">
            @csrf
            @method('delete')

            <div class="w-full px-3 2xsm:w-1/2">
                <button type="submit"
                    class="block w-full rounded border border-meta-1 bg-meta-1 p-3 text-center font-medium text-white transition hover:bg-opacity-90">
                    حذف
                </button>
            </div>


            <div class="w-full px-3 2xsm:w-1/2">
                <button @click.prevent="modalOpen = false"
                    class="block w-full rounded border border-stroke bg-gray p-3 text-center font-medium text-black transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:bg-meta-4 dark:text-white dark:hover:border-meta-1 dark:hover:bg-meta-1">
                    الغاء
                </button>
            </div>

        </form>
    </x-modal>

    @foreach ($allProducts as $item)


    <div wire:key="{{ $item->id }}"
        class="grid grid-cols-9 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-9 md:px-6 2xl:px-7.5">
        <div class="col-span-2 flex items-center">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="h-12.5 w-15 rounded-md">
                    @if ($item->image)
                    <img src="{{tenant_asset('media/'.$item->image) }}" alt="Product" />

                    @else
                    <span class="text-center text-sm">no image</span>
                    @endif
                </div>
                <p class="text-sm font-medium text-black dark:text-white">
                    {{$item->name}}
                </p>
            </div>
        </div>


        <div class="col-span-1 flex items-center">
            <p class="text-sm font-medium text-black dark:text-white">
                @foreach ($item->categories as $cat)
                <span id="badge-dismiss-default"
                    class="inline-flex items-center px-1 py-1 mb-1  me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                    {{$category->find($cat)->name}}

                </span>
                @endforeach

            </p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="text-sm font-medium text-black dark:text-white">{{$item->price}}</p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="text-sm font-medium text-black dark:text-white">{{$item->discount ? $item->discount.'%' : '-'}}
            </p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="text-sm font-medium text-black dark:text-white">{{$item->order_count}}</p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="text-sm font-medium text-black dark:text-white">{{$item->rating}}</p>
        </div>

        <div class="col-span-1 flex items-center">
            <p class="text-sm font-medium text-black dark:text-white">{{$item->created_at->toDateString(); }}</p>
        </div>

        <div class="col-span-1 flex justify-center">
            <p class="text-sm font-medium text-meta-3">




            <div x-data="{ isOpen: false }"
                class="relative flex justify-center divide-y divide-gray-3 rounded-lg border border-gray-3 shadow w-25 dark:bg-gray-700">
                <button @click.prevent="isOpen = !isOpen"
                    class="w-full inline-flex gap-2 items-center   rounded-md justify-center  text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
                    خيارات
                    <svg class="fill-current " width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.00039 11.4C7.85039 11.4 7.72539 11.35 7.60039 11.25L1.85039 5.60005C1.62539 5.37505 1.62539 5.02505 1.85039 4.80005C2.07539 4.57505 2.42539 4.57505 2.65039 4.80005L8.00039 10.025L13.3504 4.75005C13.5754 4.52505 13.9254 4.52505 14.1504 4.75005C14.3754 4.97505 14.3754 5.32505 14.1504 5.55005L8.40039 11.2C8.27539 11.325 8.15039 11.4 8.00039 11.4Z"
                            fill=""></path>
                    </svg>
                </button>

                <div @click.outside="isOpen = false" x-show="isOpen"
                    class="absolute right-0 top-full z-1  w-full  rounded-t-none bg-white py-2.5  shadow"
                    style="display: none;">


                    <button wire:click="openModel('{{$item->id}}')"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        حذف
                    </button>

                    <a href="{{Route('admin.product.edit',$item->id)}}"
                        class="flex w-full px-4 py-2 text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4">
                        تعديل
                    </a>
                </div>
            </div>




            </p>
        </div>


    </div>
    @endforeach
    <hr>
    <div dir="ltr" class="p-2">
        {{$allProducts->links()}}
    </div>
</div>