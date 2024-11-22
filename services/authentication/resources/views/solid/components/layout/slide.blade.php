@props([ 'CarouselImage'])

@vite(['resources/js/flowbite.js'])


<div id="indicators-carousel" class="relative w-full " data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-70 overflow-hidden  md:h-96 ">
        <!-- Item 1 -->

        @if (count($CarouselImage) > 1)
        @foreach ($CarouselImage as $key=>$item)
        <div class="hidden  duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ tenant_asset('media/'.$key) }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        @endforeach

        @else
        @foreach ($CarouselImage as $key=>$item)
            <img src="{{ tenant_asset('media/'.$key) }}"
                class="absolute block w-full -translate-x-1/4 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        @endforeach
        @endif


    </div>
    <!-- Slider indicators -->
    <div class="absolute -z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">

        @foreach ($CarouselImage as $key=>$item)


        <button type="button" class="w-3 h-3 " aria-current="true" aria-label="Slide 1"
            data-carousel-slide-to="{{ $loop->index }}"></button>



        @endforeach



    </div>
    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10  bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>

    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>

</div>