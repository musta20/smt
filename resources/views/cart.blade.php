<x-main-layout>
    <div class="flex gap-9 justify-center md:flex-row flex-col p-10 ">
        <div x-data class="w-3/4 gap-9">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div
                    class="grid grid-cols-10 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-4 p-5 flex items-center">
                        <p class="font-medium">السلة</p>
                    </div>
                </div>
                @if(!count($cart))
                <div
                    class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-7 flex items-center">
                        <span class="p-10">السلة فارعة</span>
                    </div>
                </div>
                @endif
                @foreach ($cart as $item)
                <div
                    class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-4 flex items-center">

                        <div class="h-12.5 w-15 rounded-md">
                            @if ($item->image)
                            <img width="100px" height="100px" src="{{tenant_asset('media/'.$item->image) }}"
                                alt="Product" />

                            @else
                            <span class="text-center text-sm">no image</span>
                            @endif
                        </div>
                        <p class="text-sm p-5  font-medium text-black dark:text-white">
                        <div class="hover:text-primary">

                            {{$item->name}}

                        </div>
                        </p>
                    </div>
                    <div class="col-span-3 hidden items-center sm:flex p-5 ">
                    </div>
                    <div class="col-span-1 p-5  flex items-center group relative inline-block">
                        <a href="{{route('removeCart',$item->id)}}" class="text-red-500 hover:text-red-950">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </a>
                        <div
                            class="shadow absolute left-full top-1/2 z-20 ml-3 -translate-y-1/2 whitespace-nowrap rounded-md bg-white px-4.5 py-1.5 text-sm font-medium opacity-0  group-hover:opacity-100 dark:bg-meta-4">
                            <span
                                class="absolute -left-1 top-1/2 -z-10 h-2 w-2 -translate-y-1/2 rotate-45 rounded-r-sm bg-white dark:bg-meta-4"></span>
                            حذف
                        </div>
                    </div>


                </div>

                @endforeach

            </div>
        </div>



    </div>

</x-main-layout>