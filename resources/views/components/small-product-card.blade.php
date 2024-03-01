

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
          
        </div>
    </div>
</div>
