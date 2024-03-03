

<div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
    <a href="{{route('productPage',$product->id)}}">
        <img class="p-8 rounded-lg"
         src="{{tenant_asset('media/'.$product->image)}}" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="{{route('productPage',$product->id)}}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900">
               {{$product->name}}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <x-user-rating :rating="$product->rating" />
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-3">
                {{$product->rating}}
            </span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900">EL.{{$product->price}}</span>
          
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
              </svg>
        </div>

    </div>
</div>
