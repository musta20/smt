<div class=" bottom-0 left-0 right-0 z-40 px-4 py-3 text-center flex justify-between text-white bg-gray-800">

<div>
    @if ($visible->showFooterLinks)
    <ul class="flex gap-3 px-1" >
        <li><a class="hover:underline" href="{{route('homePage')}}">{{__('messages.Home')}}
        </a></li>
     <li><a class="hover:underline" href="{{route('contactPage')}}">{{__('messages.Contact')}}
    </a></li>
     <li><a class="hover:underline" href="{{route('aboutPage')}}">{{__('messages.About')}}
    </a></li>
   
     <li><a class="hover:underline" href="{{route('termPage')}}">{{__('messages.Term')}}</a></li>
    </ul>
@endif
</div>
<div class="flex justify-between gap-3">
    <x-social-media />

    <div class="md:items-center">
        <img 
        src="{{tenant_asset('media/'.$logo)}}" alt="noon"  >
      
    </div>

</div>

</div>