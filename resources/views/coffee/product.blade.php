<x-main-layout :page="$product->name">
    @vite(['resources/js/flowbite.js'])

    <section class="w-4/5 m-auto" >
    <ul class="flex justify-items-center gap-1 mt-5  text-gray ">
        <li>{{ __('messages.categories') }}</li>
        <li>
            <svg class="w-3 h-3 text-gray-800 my-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li class="flex ">
            @foreach ($product->categories as $item)
            <span class="mx-2">{{ $item->name }}</span>
            @endforeach

        </li>
        <li>
            <svg class="w-3 h-3  text-gray-800 my-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
        </li>
        <li>{{ $product->name }}</li>
    </ul>

    <section id="product-carousel" data-carousel="static"
        class="flex justify-center shadow  flex-col  lg:flex-row  bg-gray-50 m-2 py-5 px-3    ">
        <!-- image galary indecater -->
        @if (count($product->media))
        <div class="lg:w-1/12 w-1/6 flex lg:flex-col lg:justify-center ">
            <img class="h-auto max-w-full rounded-lg  mb-1  " aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0" src="{{ tenant_asset('media/'.$product->image) }}" alt="">
            @foreach ($product->media as $key=>$item)
            <img class="h-auto max-w-full rounded-lg  mb-1  " aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="{{ $key+1 }}" src="{{ tenant_asset('media/'.$item->name) }}" alt="">
            @endforeach
        </div>
        @endif

        <!-- main image -->
        <div class="container w-2/3 px-2 justify-center ">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->

                <div @if (count($product->media))
                    class="hidden duration-700 ease-in-out"
                    data-carousel-item="active"
                    @endif
                    >
                    <img src="{{ tenant_asset('media/'.$product->image) }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>


                @if (count($product->media))
                @foreach ($product->media as $key=>$item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                    <img src="{{ tenant_asset('media/'.$item->name) }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                @endforeach
                @endif

            </div>
        </div>
        <div class="max-w-xl flex flex-col gap-1 px-2 justify-between">
            <div class="text-4xl">{{ $product->name }}</div>
            <hr />
            <P class="text-pretty">
                {{ $product->description }}
            </P>
            <hr />
            <div class="flex text-slate-800  justify-between">
                <div class=" w-full flex justify-between font-bold ">
                    <div class=" py-2 px-2">
                        <span class="text-2xl">
                            {{ $product->price }}
                        </span>
                        <span class="text-sm">
                            {{ __('messages.EGP') }}
                        </span>
                        <div class="">
                            @if ($product->older_price)
                            <label>{{ __('messages.olderprice') }} : </label>

                            <span class="line-through text-slate-500">

                                {{ $product->older_price }}
                                <span class="text-sm">
                                    {{ __('messages.EGP') }}
                                </span>
                            </span>

                            @endif
                        </div>
                        @if ($product->discount)
                        <label>{{ __('messages.discount') }} : </label>

                        <span class="bg-blue-100 text-xl text-blue-800 font-semibold px-2.5 py-0.5  ms-3">
                           %
                            {{ $product->discount }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>            <div>
                <a target="_blank" href="{{ $product->order_url }}" class="text-white   hover:bg-primary bg-secondary focus:outline-none focus:ring-4
             focus:ring-green-300 font-medium  text-sm px-5 py-2.5 text-center me-2 mb-2
              ">{{ __('messages.order') }}</a>

            <a href="{{ route('addToCart',$product->id) }}"
                class="text-white hover:bg-gray-800 bg-gray-500  focus:outline-none focus:ring-4 focus:ring-slate-300 font-medium  text-sm px-5 py-3 text-center  mb-2">{{ __('messages.Add to cart') }}
            </a>
            </div>
        </div>
    </section>

    <div class="flex shadow bg-gray-50 mt-2 py-5 px-3    ">
        <div class="w-1/2">

            @if ($product->visible->CanReview && $visible->CanReview && $visible->OnlycustomerCanReview)

            <form method="post" action="{{ route('comment.store') }}" class="p-2 m-2 space-x-2">
                @csrf
                <label for="message" class="block mb-2 text-sm  font-medium text-gray-900 dark:text-white">
                    {{ __('messages.add review') }}
                </label>
                <x-newstyle::add-rating />
                <textarea id="comment" rows="4" name="comment"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50  border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""></textarea>
                <button type="submit" class="text-white m-2  hover:bg-primary bg-secondary focus:outline-none focus:ring-4
                focus:ring-green-300 font-medium  text-sm px-5 py-2.5 text-center me-2 mb-2
                 ">{{ __('messages.publish') }}</button>
                <input value="{{ $product->id }}" name="product_id" hidden />
            </form>
            <hr>

            @endif

            <span class="text-xl">{{ __('messages.reviews') }} :</span>
            @foreach ($product->comment as $comment)
            <x-comment-card :$comment />
            @endforeach
        </div>

        <div dir="ltr" class="flex justify-center w-1/2">

            <div class="flex  flex-col justify-items-end     w-9/12">
                <span class="flex sm:flex-col justify-between my-2">
                    <x-user-rating :rating="$totalRating" />
                    <strong>
                        {{ __('messages.over all rating') }}

                        {{ __('messages.based on') }}({{ array_sum($allRating) }}) {{ __('messages.reviews') }}
                    </strong>
                </span>
                <hr>
                @foreach ($allRating as $key=>$item)
                <span class="flex max-h-6  p-1">
                    <span class="w-2/12 ">
                        {{ $key }} star
                    </span>
                    @php
                    $perst =0 ;

                    if (array_sum($allRating) > 0) {
                    $perst = floor($item/array_sum($allRating)*100);
                    }
                    @endphp
                    <div dir="ltr" class="  w-10/12  bg-gray-100  dark:bg-gray-200">
                        <div style="width: {{ $perst }}%" @class(['bg-yellow-300 text-xs text-white font-medium
                            text-blue-100 text-center p-0.5 leading-none ', 'hidden'=> !$perst ]) >
                            {{ $perst }}%</div>
                    </div>
                </span>
                @endforeach
            </div>
        </div>
    </div>

    <x-newstyle::recommended-product :$recomendedProduct />
</section>
</x-main-layout>