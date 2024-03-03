<x-main-layout>
    <ul class="flex justify-items-center  gap-1   text-gray ">
        <li>التصنيفات</li>
        <li>
            <svg class="w-[12px] h-[12px] text-gray-800 my-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li class="flex ">
            @foreach ($product->categories as $item)
            <span class="mx-2">{{$item->name}}</span>
            @endforeach

        </li>
        <li>
            <svg class="w-[12px] h-[12px] text-gray-800 my-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li>{{$product->name}}</li>
    </ul>
    <section id="product-carousel" data-carousel="static"
        class="flex justify-center flex-col  lg:flex-row  bg-white m-2 py-5 px-3 rounded-lg  border ">
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
        <div class="container w-2/3 px-2 justify-center ">
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

            </div>
        </div>
        <div class="max-w-xl flex flex-col gap-1 justify-between">
            <div class="text-4xl">{{$product->name}}</div>
            <hr />
            <P class="text-pretty">
                {{$product->description }}
            </P>
            <hr />
            <span class="text-3xl ">{{$product->price}}.EL</span>
            <div>
            <button type="submit" class="text-white  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
             focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2
              ">طلب المنتج</button>
            <a href="{{route('addToCart',$product->id)}}" class="text-white  bg-slate-700 hover:bg-slate-800 focus:outline-none focus:ring-4
              focus:ring-slate-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2
               ">اضافة للسلة
            </a>
            </div>
        </div>
    </section>
    <div class="flex bg-white m-2 py-5 px-3  rounded-lg  border">
        <div class="w-1/2">
            @if ($product->visible->CanReview && $visible->CanReview && $visible->OnlyCustmerCanReview)

            <form method="post" action="{{route('comment.store')}}" class="p-2 m-2 space-x-2">
                @csrf
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    اضف التعليق
                </label>
                <x-add-rating />
                <textarea id="comment" rows="4" name="comment"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="ماهو رأيك في المنتج"></textarea>
                <button type="submit" class="text-white m-2  bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
                focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2
                 ">نشر</button>
                <input value="{{$product->id}}" name="product_id" hidden />
            </form>
            <hr>

            @endif

            <span class="text-xl">التعليقات :</span>
            @foreach ($product->comment as $comment)
            <x-comment-card :$comment />
            @endforeach
        </div>

        <div dir="ltr" class="flex justify-center w-1/2">

            <div class="flex flex-col justify-items-end     w-9/12">
                <span class="flex justify-between my-2">
                    <x-user-rating :rating="$totalRating" />
                    <strong>
                        التقييم العام

                        بناءً على ({{array_sum($allRating)}}) تقييمات
                    </strong>
                </span>
                <hr>
                @foreach ($allRating as $key=>$item)
                <span class="flex max-h-6  p-1">
                    <span class="w-2/12 ">
                        {{$key}} star
                    </span>
                    @php
                    $perst =0 ;

                    if (array_sum($allRating) > 0) {
                    $perst = floor($item/array_sum($allRating)*100);
                    }
                    @endphp
                    <div dir="ltr" class="  w-10/12  bg-gray-100 rounded-full dark:bg-gray-200">
                        <div style="width: {{$perst}}%" @class(['bg-yellow-300 text-xs text-white font-medium
                            text-blue-100 text-center p-0.5 leading-none rounded-full', 'hidden'=> !$perst ]) >
                            {{$perst}}%</div>
                    </div>
                </span>
                @endforeach
            </div>
        </div>
    </div>
    <x-recommended-product :$recomendedProduct />
</x-main-layout>