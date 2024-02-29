
<div style="z-index: 100" class="fixed h-20 w-full bottom-2 top-0 mx-auto px-6 py-3 bg-white border-b-2">

    <div class="flex items-center justify-between">

        <!-- auth box -->
        <div class=" ">
            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white"
             src="https://github.com/musta20.png"
                alt="{user.handle}" /> 
            </div>

        <!-- search box -->
        <form action="{{route('searchPage')}}" class="relative w-1/3">

            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <button>
                <svg class="h-5 w-5 text-gray-500 " viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            </span>

            <input
            name="search"
                class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                type="text" placeholder="Search">
        </form>
        
        <!-- brand logo -->
        <div class="md:items-center">
            <img 
            src="{{tenant_asset('media/'.$logo)}}" alt="noon"
              >
        </div>

    </div>
    <x-toast />
    
 

</div>
<x-layout.nav  />

