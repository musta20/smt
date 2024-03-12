<div class="w-full  bg-gray-50 border-2  border-gray-30 text-gray-700  hover:shadow-md   ">
    <div class="w-full  overflow-hidden max-h-60">
        <a href="{{route('productPage',$product->id)}}">
            <img class="   " src="{{tenant_asset('media/'.$product->image)}}" alt="product image" />
        </a>
    </div>
    <div class="p-5 pb-5">
        <a href="{{route('productPage',$product->id)}}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-700">
                {{$product->name}}</h5>
        </a>

        <div class="flex items-center mt-2.5 mb-5">
            <x-user-rating :rating="$product->rating" />
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-3">
                {{$product->rating}}
            </span>
        </div>

        <div class="flex  justify-between">
            <div class="text-3xl w-full flex justify-between font-bold ">
                <div class="flex justify-center justify-items-center">
                    <span class="text-sm">
                        {{__('messages.EGP')}}
                    </span>
                    <span>
                        {{$product->price}}
                    </span>
             
                    <div class="text-sm">
                        @if ($product->older_price)
                        <span class="line-through text-slate-500">
                            {{$product->older_price}}
                            
                        </span>
                        @endif
                        @if ($product->discount)
                        <span class="bg-blue-100 text-blue-800 font-semibold px-2.5 py-0.5 rounded ms-3">
                           %
                            {{$product->discount}}
                        </span>
                        @endif
                    </div>

                </div>


                <a href="{{route('addToCart',$product->id)}}" class="p-2">
                    <svg class="w-6 h-6  hover:!text-slate-500 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>