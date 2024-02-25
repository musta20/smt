<x-main-layout>
    <ul class="flex justify-items-center align-baseline gap-1 py-2 ">
        <li>التصنيفات</li>
        <li>
            <svg class="w-[12px] h-[12px] text-gray-800" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li>الاحذية</li>
        <li>
            <svg class="w-[12px] h-[12px] text-gray-800" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li>حذاء</li>

    </ul>


    <section id="product-carousel" data-carousel="static" class="flex justify-center flex-col  lg:flex-row    ">
        <!-- image galary indecater -->
        <div class="lg:w-1/12 w-1/6 flex lg:flex-col lg:justify-center ">
            <img class="h-auto max-w-full rounded-lg  mb-1  " aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                alt="">

            <img class="h-auto max-w-full rounded-lg mb-1" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                alt="">

            <img class="h-auto max-w-full rounded-lg mb-1" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                alt="">

            <img class="h-auto max-w-full rounded-lg mb-1" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                alt="">

            <img class="h-auto max-w-full rounded-lg mb-1" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                alt="">
        </div>

        <!-- main image -->
        <div class="container w-2/3 px-2 justify-center">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>

            </div>
        </div>
        <!-- product detail-->
        <div class="max-w-xl flex flex-col gap-1">
            <div class="text-4xl">{{$product->name}}</div>
            <hr />

            {{$product->description }}
            <hr />
            <span class="text-4xl">{{$product->price}}</span>

            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
             focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2
              ">طلب المنتج</button>



        </div>

    </section>
    <hr />

    <x-recommended-product :$recomendedProduct/>
</x-main-layout>