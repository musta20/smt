<x-main-layout :page="__('messages.Cart')">
    <div class="flex gap-9 justify-center md:flex-row flex-col p-10 ">
        <div x-data class="w-3/4 gap-9">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div
                    class="grid grid-cols-10 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-4 p-5 flex items-center">
                        <p class="font-medium">{{ __('messages.Cart') }}</p>
                    </div>
                </div>
                @if (!count($cart))
                <div
                    class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-7 flex items-center">
                        <span class="p-10">{{ __('messages.your shoping cart is empty') }}</span>
                    </div>
                </div>
                @endif
                @foreach ($cart as $item)
                <div
                    class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-4 flex items-center">
                        <a href="{{ route('productPage',$item->id) }}">
                            <div class="h-12.5 w-15 rounded-md">
                                @if ($item->image)
                                <img width="100px" height="100px" src="{{ tenant_asset('media/'.$item->image) }}"
                                    alt="Product" />

                                @else
                                <span class="text-center text-sm">{{ __('messages.no image') }}</span>
                                @endif
                            </div>
                        </a>
                        <p class="text-sm p-5  font-medium text-black dark:text-white">
                        <div class="hover:text-primary">

                            {{ $item->name }}

                        </div>
                        </p>
                    </div>
                    <div class="col-span-3 hidden items-center sm:flex p-5 ">
                    </div>
                    <div class="col-span-1 p-5  flex items-center group relative inline-block">
                        <a href="{{ route('removeCart',$item->id) }}" class="text-red-500 hover:text-red-950">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>

                        </a>
                        <div
                            class="shadow absolute left-full top-1/2 z-20 ml-3 -translate-y-1/2 whitespace-nowrap rounded-md bg-white px-4.5 py-1.5 text-sm font-medium opacity-0  group-hover:opacity-100 dark:bg-meta-4">
                            <span
                                class="absolute -left-1 top-1/2 -z-10 h-2 w-2 -translate-y-1/2 rotate-45 rounded-r-sm bg-white dark:bg-meta-4"></span>
                            {{ __('messages.delete') }}
                        </div>
                    </div>


                </div>

                @endforeach

            </div>
        </div>



    </div>

</x-main-layout>