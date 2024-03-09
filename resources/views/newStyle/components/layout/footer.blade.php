
<footer class="container mx-auto bg-white py-8 border-t border-gray-400">
<div class="container flex px-3 py-8 ">
<div class="w-full mx-auto flex flex-wrap">
  <div class="flex w-full lg:w-1/2 ">
    <div class="px-3 md:px-0">
      <div class="flex justify-between gap-3">
    
        <div class="md:items-center">
            <img 
            src="{{tenant_asset('media/'.$logo)}}" alt="noon"  >
          
        </div>        @if ($visible->showFooterLinks)
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
    </div>
  </div>
  <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right mt-6 md:mt-0">
    <div class="px-3 md:px-0">
      <x-social-media :color="'#4b4d4f'" />

     
    </div>
  </div>
</div>
</div>
</footer>
