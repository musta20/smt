<div style="z-index: 100" class="fixed h-20 w-full bottom-2 top-0 mx-auto px-6 py-3 bg-white border-b-2">
    <div class="flex items-center justify-between ">
        <!-- auth box -->
        <div class="flex gap-2 !text-slate-500">
            @auth
            <div class="relative !min-w-90" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                    <div class="flex justify-center justify-items-center p-1.5 uppercase font-bold text-xl 
                    text-center w-10 h-10 rounded-full bg-cyan-200 
                     border-3 text-slate-700">
                        <p>{{ substr(auth()->user()->name,0*2,1*2) }}</p>
                    </div>
                </a>
                <!-- Dropdown Start -->
                <div  x-show="dropdownOpen"
                    class="absolute ltr:-right-25 mt-4 flex  flex-col rounded-sm border border-stroke bg-white shadow-default">
                    <ul class="flex flex-col border-b w-40 border-stroke px-6 py-7.5">
                        <li>
                            <a href="{{route('profilePage')}}"
                                class="flex items-center py-4 gap-1 text-xs  font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 9.62499C8.42188 9.62499 6.35938 7.59687 6.35938 5.12187C6.35938 2.64687 8.42188 0.618744 11 0.618744C13.5781 0.618744 15.6406 2.64687 15.6406 5.12187C15.6406 7.59687 13.5781 9.62499 11 9.62499ZM11 2.16562C9.28125 2.16562 7.90625 3.50624 7.90625 5.12187C7.90625 6.73749 9.28125 8.07812 11 8.07812C12.7188 8.07812 14.0938 6.73749 14.0938 5.12187C14.0938 3.50624 12.7188 2.16562 11 2.16562Z"
                                        fill="" />
                                    <path
                                        d="M17.7719 21.4156H4.2281C3.5406 21.4156 2.9906 20.8656 2.9906 20.1781V17.0844C2.9906 13.7156 5.7406 10.9656 9.10935 10.9656H12.925C16.2937 10.9656 19.0437 13.7156 19.0437 17.0844V20.1781C19.0094 20.8312 18.4594 21.4156 17.7719 21.4156ZM4.53748 19.8687H17.4969V17.0844C17.4969 14.575 15.4344 12.5125 12.925 12.5125H9.07498C6.5656 12.5125 4.5031 14.575 4.5031 17.0844V19.8687H4.53748Z"
                                        fill="" />
                                </svg>
                                <span class="text-xs ">
                                {{__('messages.Profile')}}
                                </span>
                            </a>
                        </li>

                        @role(App\Enums\Identity\Role::VENDER->value)
                        <li>
                            <a href="{{route('admin.dashboard')}}"
                                class="flex items-center py-4 gap-3.5 text-xs font-medium duration-300 ease-in-out hover:text-primary ">
                                <svg class="fill-current text-xs " width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 9.62499C8.42188 9.62499 6.35938 7.59687 6.35938 5.12187C6.35938 2.64687 8.42188 0.618744 11 0.618744C13.5781 0.618744 15.6406 2.64687 15.6406 5.12187C15.6406 7.59687 13.5781 9.62499 11 9.62499ZM11 2.16562C9.28125 2.16562 7.90625 3.50624 7.90625 5.12187C7.90625 6.73749 9.28125 8.07812 11 8.07812C12.7188 8.07812 14.0938 6.73749 14.0938 5.12187C14.0938 3.50624 12.7188 2.16562 11 2.16562Z"
                                        fill="" />
                                    <path
                                        d="M17.7719 21.4156H4.2281C3.5406 21.4156 2.9906 20.8656 2.9906 20.1781V17.0844C2.9906 13.7156 5.7406 10.9656 9.10935 10.9656H12.925C16.2937 10.9656 19.0437 13.7156 19.0437 17.0844V20.1781C19.0094 20.8312 18.4594 21.4156 17.7719 21.4156ZM4.53748 19.8687H17.4969V17.0844C17.4969 14.575 15.4344 12.5125 12.925 12.5125H9.07498C6.5656 12.5125 4.5031 14.575 4.5031 17.0844V19.8687H4.53748Z"
                                        fill="" />
                                </svg>
                                <span class="text-xs " >
                                {{__('messages.Dashboard')}}
                                </span>
                            </a>
                        </li>

                        @endrole



                    </ul>
                    <button
                        class="flex items-center gap-3 py-4 px-3  text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                        <svg class="fill-current text-xs " width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z"
                                fill="" />
                            <path
                                d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z"
                                fill="" />
                        </svg>
                        <form method="POST" class="w-70 text-xs " action="{{ route('logout') }}">
                            @csrf
                            <a onclick="event.preventDefault();
                                          this.closest('form').submit();">
                                {{ __('messages.Log Out') }}
                            </a>
                        </form>
                    </button>
                </div>
                <!-- Dropdown End -->
            </div>
            @else
            @if ($visible->AllowUsers)
            <a class="flex gap-2 justify-center justify-items-center p-2" href="{{route('login')}}">
                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 9.62499C8.42188 9.62499 6.35938 7.59687 6.35938 5.12187C6.35938 2.64687 8.42188 0.618744 11 0.618744C13.5781 0.618744 15.6406 2.64687 15.6406 5.12187C15.6406 7.59687 13.5781 9.62499 11 9.62499ZM11 2.16562C9.28125 2.16562 7.90625 3.50624 7.90625 5.12187C7.90625 6.73749 9.28125 8.07812 11 8.07812C12.7188 8.07812 14.0938 6.73749 14.0938 5.12187C14.0938 3.50624 12.7188 2.16562 11 2.16562Z"
                        fill=""></path>
                    <path
                        d="M17.7719 21.4156H4.2281C3.5406 21.4156 2.9906 20.8656 2.9906 20.1781V17.0844C2.9906 13.7156 5.7406 10.9656 9.10935 10.9656H12.925C16.2937 10.9656 19.0437 13.7156 19.0437 17.0844V20.1781C19.0094 20.8312 18.4594 21.4156 17.7719 21.4156ZM4.53748 19.8687H17.4969V17.0844C17.4969 14.575 15.4344 12.5125 12.925 12.5125H9.07498C6.5656 12.5125 4.5031 14.575 4.5031 17.0844V19.8687H4.53748Z"
                        fill=""></path>
                </svg>
                <span>{{__('messages.Login')}}</span>

            </a>
            @endif
            @endauth

            @auth
            <a href="{{route('showCart')}}"
                class="hover:bg-slate-100 rounded-full p-2 flex justify-center justify-items-center">
                <span class="relative inline-block">
                    <svg class="w-7 h-7 text-gray-600 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 1 12c0 .5-.5 1-1 1H6a1 1 0 0 1-1-1L6 8h12Z" />
                    </svg>
                    @if (count($userCart) > 0)
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs 
                font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                        {{ count($userCart) }}
                    </span>
                    @endif

                </span>
            </a>
            @else
            <a href="{{route('showCart')}}"
                class="hover:bg-slate-100 rounded-full p-2 flex justify-center justify-items-center">
                <span class="relative inline-block">
                    <svg class="w-7 h-7 text-gray-600 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 1 12c0 .5-.5 1-1 1H6a1 1 0 0 1-1-1L6 8h12Z" />
                    </svg>
                    @session('cart')
                    @if (count($value))
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs 
                    font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                                {{ count($value) }}
                            </span>  
                    @endif
        
                    @endsession
                </span>
            </a>
            @endauth

            @if (app()->getLocale() == 'ar')
            <a class="p-1 m-1 rounded-md border hover:bg-slate-200" href="{{route('setLocale','en')}}" >English</a>

            @else
            <a class="p-1 m-1 rounded-md border hover:bg-slate-200" href="{{route('setLocale','ar')}}" >العربية</a>

            @endif


        </div>
        <!-- search box -->
        <form action="{{route('searchPage')}}" @class(['relative w-1/3', 'hidden'=> $SearchBox])>

            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <button>
                    <svg class="h-5 w-5 text-gray-500 " viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </button>
            </span>

            <input name="search"
                class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                type="text" placeholder="Search">
        </form>
        <!-- brand logo -->
        <div class="md:items-center p-2">
            <a href="/">
                <img src="{{tenant_asset('media/'.$logo)}}" alt="noon">
            </a>
        </div>
    </div>
    <x-toast />
</div>
<x-layout.nav />