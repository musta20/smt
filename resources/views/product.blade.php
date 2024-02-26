<x-main-layout>
    <ul class="flex justify-items-center align-baseline gap-1  py-2 ">
        <li>التصنيفات</li>
        <li>
            <svg class="w-[12px] h-[12px] text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li>الاحذية</li>
        <li>
            <svg class="w-[12px] h-[12px] text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li>حذاء</li>

    </ul>


    <section id="product-carousel" data-carousel="static"
        class="flex justify-center flex-col  lg:flex-row  bg-white m-2 py-5 px-3 rounded-lg  border">
        <!-- image galary indecater -->

        @if(count($product->media))
        <div class="lg:w-1/12 w-1/6 flex lg:flex-col lg:justify-center ">
            <img class="h-auto max-w-full rounded-lg  mb-1  " aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0" src="{{tenant_asset('media/'.$product->image)}}" alt="">
            @foreach ($product->media as $key=>$item)
            <img class="h-auto max-w-full rounded-lg  mb-1  " aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="{{$key+1}}" src="{{tenant_asset('media/'.$item->name)}}" alt="">
            @endforeach
        </div>
        @endif



        <!-- main image -->
        <div class="container w-2/3 px-2 justify-center">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->

                <div @if(count($product->media))
                    class="hidden duration-700 ease-in-out"
                    data-carousel-item="active"
                    @endif
                    >
                    <img src="{{tenant_asset('media/'.$product->image)}}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>


                @if(count($product->media))
                @foreach ($product->media as $key=>$item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                    <img src="{{tenant_asset('media/'.$item->name)}}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                @endforeach
                @endif

                <!-- Item 2 -->

                <!-- Item 3 -->


            </div>
        </div>
        <!-- product detail-->
        <div class="max-w-xl flex flex-col gap-1 justify-between">
            <div class="text-4xl">{{$product->name}}</div>
            <hr />
            <P class="text-pretty">
                {{$product->description }}
            </P>
            <hr />
            <span class="text-3xl ">{{$product->price}}.EL</span>

            <button type="button" class="text-white  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
             focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2
              ">طلب المنتج</button>



        </div>

    </section>

    <x-recommended-product :$recomendedProduct />
</x-main-layout>