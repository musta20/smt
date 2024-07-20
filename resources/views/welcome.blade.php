<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/tiny-swiper@latest/lib/index.min.js"></script>
    <script src="https://unpkg.com/tiny-swiper@latest/lib/modules/autoPlay.min.js"></script>
    <link rel="icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <title>Matajer -  Ecommerce Platform for All Businesses.</title>
</head>

<body class="font-Cairo">
    <header class="w-full bg-[url('/resources/images/banner-bg.png')] pt-5 bg-cover bg-center bg-no-repeat">
        <nav id="header" class="flex justify-between px-5 py-5 rounded-lg  text-white mx-auto w-5/6 bg-[#312363]">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="w-10" alt="Matajer" />

            <ul class="flex gap-5 my-auto">
                <li class="hover:text-[#724aff]" ><a href="#">{{ __('messages.Home')}}</a></li>
                <li class="hover:text-[#724aff]" ><a href="#">{{ __('messages.About')}}</a></li>
                <li class="hover:text-[#724aff]" ><a href="#">{{ __('messages.Contact')}}</a></li>

    @if (app()->getLocale() == 'ar')
    <li class="hover:text-[#724aff]" >  <a class="p-1 m-1 rounded-md border hover:bg-slate-200" href="{{ route('setLocale','en') }}" >English</a>
    </li>

    @else
    <li class="hover:text-[#724aff]" ><a class="p-1 m-1 rounded-md border hover:bg-slate-200" href="{{ route('setLocale','ar') }}" >العربية</a>

    </li>
    @endif
         
            </ul>

        </nav>
        <div class="flex justify-evenly px-5 my-32 rounded-lg text-white mx-auto w-5/6">
            <div class="w-1/2 text-[#312363]">
                <span class="text-xl">{{ __('messages.E-Commerce Solution')}} </span>
                <h3 class="text-5xl">
                    {{ __('messages.E-Commerce Platform for All Businesses.')}}
                </h3>
                <p class="my-5">
                    {{ __('messages.Matajer_sentence') }}
                </p>
                <a href="{{ route('register') }}" class="bg-[#312363] hover:bg-[#724aff] text-white px-5 py-3 rounded-lg">
                    {{ __('messages.get_started')}}
                </a>
            </div>
            <div class="flex place-items-center gap-5 w-1/2">
                {{-- <img class="w-56 animate-wiggle"
                    src="{{ Vite::asset('resources/svg/online-classes-svgrepo-com.svg') }}" /> --}}


                <lottie-player src="{{  asset('lottie/Animation-1721330082154.json') }}" debug background="transparent"
                    speed="1" style="width: 600px; height: 500px" direction="1" mode="normal" loop autoplay>
                </lottie-player>
            </div>
        </div>
        <div class="flex flex-col gap-5 place-items-center">
            <h3 class="text-5xl text-[#312363]">{{ __('messages.Matajer')}}</h3>

            <img src="{{ Vite::asset('resources/svg/quality-site-website-svgrepo-com.svg') }}" class="w-24" alt="" />
            <p class="text-xl text-[#312363] w-1/2 text-center">
                {{__('messages.Matajer empowers customer-centric businesses with tools that make every interaction more human and helpful.')}}
            </p>
        </div>

        <div class="flex gap-5 justify-around w-4/6 mx-auto p-10">
            <div
                class="text-[#312363] border bg-[#f8f8f8] hover:text-white shadow-lg p-5 hover:bg-purple-950 rounded-lg">
                <h3 class="text-xl font-bold">{{ __('messages.Analytics')}}</h3>
                <p class="my-5">
                    {{ __('messages.Matajer is an easy to use tool all very easy! e - Commerce. With the help of our system you can present.')}}
                </p>
            </div>

            <div
                class="text-[#312363] border max-w-[400px] bg-[#f8f8f8] hover:text-white shadow-lg p-5 hover:bg-purple-950 rounded-lg">
                <h3 class="text-xl font-bold">{{ __('messages.Ecommerce') }}</h3>
                <p class="my-5">
                    {{ __('messages.Matajer is an easy to use tool all very easy! e - Commerce. for all you ecommers users.')}}
                </p>
            </div>

            <div
                class="text-[#312363] border max-w-[400px] bg-[#f8f8f8] hover:text-white shadow-lg p-5 hover:bg-purple-950 rounded-lg">
                <h3 class="text-xl font-bold">{{ __('messages.Payment') }}</h3>
                <p class="my-5">
                    {{ __('messages.Matajer is an easy to use tool all very easy! to mange your Payment with customers.')}}
                </p>
            </div>
        </div>
    </header>

    <main>
        <section class="flex justify-between gap-2 place-items-center py-20 w-5/6 mx-auto">
            <div class="w-3/6 text-[#312363]">
                <span class="text-xl py-1 mb-2 border-b-[3px] border-[#8765ff]">{{__('messages.Products')}}</span>
                <h3 class="text-5xl py-3">{{ __('messages.Look and feel matters')}}</h3>
                <p class="my-5">
                {{ __('messages.well organized products for easy add and update, with the help of matajer platform.') }}
                </p>
            </div>
            <div class="w-4/6">
                <img src="{{ Vite::asset('resources/images/Screenshot from 2024-07-19 01-33-16.png') }}"
                    class="w-[700px] shadow-2xl mt-40 absolute ml-40 rounded-lg place-items-end" alt="" />
                <img src="{{ Vite::asset('resources/images/Screenshot from 2024-07-19 01-33-33.png') }}"
                    class="w-[700px] shadow-2xl rounded-lg place-items-end" alt="" />
            </div>
        </section>
        <section class="flex justify-between place-items-center py-20 w-5/6 mx-auto">
            <div class="w-4/6">
                <img src="{{ Vite::asset('resources/images/Screenshot from 2024-07-19 01-33-42.png') }}"
                    class="w-[700px] shadow-2xl mt-40 -ml-32 absolute rounded-lg place-items-end" alt="" />
                <img src="{{ Vite::asset('resources/images/Screenshot from 2024-07-19 01-33-33.png') }}"
                    class="w-[700px] shadow-2xl rounded-lg place-items-end" alt="" />
            </div>

            <div class="w-3/6 text-[#312363]">
                <span class="text-xl py-1 mb-2 border-b-[3px] border-[#8765ff]">{{__('messages.Controle you store')}}</span>
                <h3 class="text-5xl py-3">{{ __('messages.Keep your store up to date') }}</h3>
                <p class="my-5">
                    {{ __('messages.Complete control over your store to ensure that you benefit from the products and services available.') }}
                </p>
            </div>
        </section>
        <section class="flex flex-col justify-between gap-2 place-items-center mt-32 py-20 bg-[#f8f8f8] mx-auto">
            <h3 class="text-5xl py-5 text-[#312363]">{{ __('messages.plans') }}</h3>
        
            <div class="flex gap-5">
                <div
                    class="border-[#312363] border text-[#312363] hover:bg-[#8765ff] hover:shadow-2xl p-16 rounded-lg flex flex-col gap-5 place-items-center">
                    <h3 class="text-3xl">{{ __('messages.basic plan') }}</h3>
                    <p class="text-3xl">$50</p>
                    <ul class="py-5 flex flex-col gap-2">
                        <li>1 {{ __('messages.user') }}</li>
                        <li>10 {{ __('messages.projects')}}</li>
                        <li>10GB {{ __('messages.storage')}}</li>
                        <li>24/7 {{ __('messages.support')}}</li>
                        <li>{{ __('messages.unlimited')}}</li>
                    </ul>
                    <a href="{{ route('register') }}"  class="hover:bg-[#8765ff] text-white p-5 m-5 rounded-lg bg-[#312363]">
                        {{ __('messages.Get Started') }}
                    </a>
                </div>

                <div
                    class="text-[#312363] hover:bg-[#8765ff] border-[#8765ff] border-4 hover:shadow-2xl rounded-lg flex flex-col place-items-center">
                    <h3 class="text-xl w-full text-center bg-[#8765ff] text-white p-5">
                        most popular
                    </h3>

                    <div class="flex flex-col gap-5 place-items-center p-16 rounded-md">
                        <h3 class="text-3xl">{{ __('messages.golden plan') }}</h3>
                        <p class="text-3xl">$100</p>
                        <ul class="py-5 flex flex-col gap-2">
                            <li>1 {{ __('messages.user') }}</li>
                            <li>10 {{ __('messages.projects')}}</li>
                            <li>10GB {{ __('messages.storage')}}</li>
                            <li>24/7 {{ __('messages.support')}}</li>
                            <li>{{ __('messages.unlimited')}}</li>
                        </ul>
                        <a href="{{ route('register') }}"  class="hover:bg-[#8765ff] text-white p-5 m-5 rounded-lg bg-[#312363]">
                            {{ __('messages.Get Started') }}
                        </a>
                    </div>
                </div>

                <div
                    class="border-[#312363] text-[#312363] hover:bg-[#8765ff] border hover:shadow-2xl p-16 rounded-lg flex flex-col gap-5 place-items-center">
                    <h3 class="text-3xl">{{ __('messages.platinum plan') }}</h3>
                    <p class="text-3xl">$70</p>
                    <ul class="py-5 flex flex-col gap-2">
                        <li>1 {{ __('messages.user') }}</li>
                        <li>10 {{ __('messages.projects')}}</li>
                        <li>10GB {{ __('messages.storage')}}</li>
                        <li>24/7 {{ __('messages.support')}}</li>
                        <li>{{ __('messages.unlimited')}}</li>
                    </ul>
                    <a href="{{ route('register') }}"  class="hover:bg-[#8765ff] text-white p-5 m-5 rounded-lg bg-[#312363]">
                        {{ __('messages.Get Started') }}
                    </a>
                </div>
            </div>
        </section>
        <section
            class="w-full h-[600px] bg-[url('/resources/images/bg-map.png')] bg-[#a89dd3] bg-cover bg-center bg-no-repeat">
            <div dir="ltr" class="w-full">
                <!-- Tiny-Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide my-32">
                            <div dir="rtl" class="bg-white p-5 text-[#312363] rounded-md my-auto w-1/2">
                                <div class="flex justify-around gap-2">
                                    <div class="p-5">
                                        <img src="{{ Vite::asset('resources/images/face3.jpeg') }}"
                                            class="border-scondary-light rounded-full w-[600px]" alt="" />
                                    </div>
                                    <p class="text-md p-5 my-auto text-scondary-light font-bold text-justify">
                                       
                                        {{ __('messages.customer_commet') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide my-32">
                            <div dir="rtl" class="bg-white p-5 text-[#312363] rounded-md my-auto w-1/2">
                                <div class="flex justify-around gap-2">
                                    <div class="p-5">
                                        <img src="{{ Vite::asset('resources/images/face2.jpeg') }}"
                                            class="border-scondary-light rounded-full w-[600px]" alt="" />
                                    </div>
                                    <p class="text-md p-5 text-scondary-light font-bold text-justify">
                                        مرحبًا بك في عالم الإبداع الخطي! منصتنا هي الوجهة المثالية
                                        لكل من يعشق فن التجارة الالكترونية ويرغب في تطوير مهاراته. سواء
                                        كنت مصممًا محترفًا أو هاويًا متحمسًا، ستجد هنا كل الأدوات
                                        اللازمة لإطلاق العنان لإبداعك. يمكنك البدء بتصميم موقعك
                                        الخاصة باستخدام أدواتنا السهلة والمتطورة، أو استكشاف
                                        مجموعة واسعة من المنتجات من قبل مبدعين آخرين. استفد
                                        من ميزة المشاركة لعرض أعمالك على مجتمع من المهتمين
                                        والخبراء، وتلقي ملاحظات قيمة تساعدك على التطور.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide my-32">
                            <div dir="rtl" class="bg-white p-5 text-[#312363] rounded-md my-auto w-1/2">
                                <div class="flex justify-around gap-2">
                                    <div class="p-5">
                                        <img src="{{ Vite::asset('resources/images/face1.jpeg') }}"
                                            class="border-scondary-light rounded-full w-[600px]" alt="" />
                                    </div>
                                    <p class="text-md p-5 my-auto text-scondary-light font-bold text-justify">
                                        {{ __('messages.customer_commet') }}

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="py-10 sm:py-16 text-[#312363] font-Mada lg:py-24">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl">
                       {{ __('messages.Frequently asked questions') }}
                    </h2>
                </div>
                <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16">
                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                        <button type="button" id="question1" data-state="closed"
                            class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold"> {{__('messages.what is matajer')}}?</span>
                            <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="answer1" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                            <p>{{ __('messages.what_is_matajer') }}</p>
                        </div>
                    </div>
                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                        <button type="button" id="question2" data-state="closed"
                            class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold">{{ __('messages.how to use matajer')}}?</span>
                            <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="answer2" style="display: none" class="px-4 text-primary pb-5 sm:px-6 sm:pb-6">
                            <p>
                               {{ __('messages.use_matajer') }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                        <button type="button" id="question3" data-state="closed"
                            class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold">{{ __('messages.how_m_s')}}</span>
                            <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="answer3" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                            <p>
                                موقع  يضمن لك حقوقك بشكل كامل، كن مطمئنا عند شراء أي خدمة
                                معروضة في الموقع، يقوم حروف بدور الوسيط بين المشتري والبائع
                                ويحمي حقوق الطرفين المالية في حال الالتزام بشروط موقع حروف
                                وبنود الضمان والإبقاء على جميع التواصلات داخل الموقع.
                            </p>
                        </div>
                    </div>
                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                        <button type="button" id="question4" data-state="closed"
                            class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold">
                                {{ __('messages.not_s')}}</span>
                            <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="answer4" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                            <p>
                                في حال عدم رضاك عن الخدمة المستلمة يمكنك طلب التعديلات عليها
                                من البائع، وفي حال كانت الخدمة المستلمة دون الجودة الموضحة في
                                وصف الخدمة، يمكنك إلغاء الطلب ببساطة ليعود الرصيد لحسابك
                                وتتمكن من شراء إحدى الخدمات الأخرى على الموقع. عند مواجهتك لأي
                                مشكلة لا تتردد في التواصل بشكل مباشر مع خدمة العملاء عن طريق
                                مركز المساعدة.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                // JavaScript to toggle the answers and rotate the arrows
          document
            .querySelectorAll('[id^="question"]')
            .forEach(function (button, index) {
              button.addEventListener("click", function () {
                var answer = document.getElementById("answer" + (index + 1));
                var arrow = document.getElementById("arrow" + (index + 1));

                if (
                  answer.style.display === "none" ||
                  answer.style.display === ""
                ) {
                  answer.style.display = "block";
                  arrow.style.transform = "rotate(0deg)";
                } else {
                  answer.style.display = "none";
                  arrow.style.transform = "rotate(-180deg)";
                }
              });
            });
            </script>
        </section>
    </main>
    <script>
        window.addEventListener("scroll", function () {
    var header = document.getElementById("header");
  //  var banner = document.getElementById("banner");
    if (window.pageYOffset > 0) {
      header.classList.add(
        "fixed",
        "top-0",
        "w-full",
        "rounded-none",
        "z-50",
        "px-20",

        "bg-opacity-50",
        "backdrop-blur-sm"
      );
    } else {
      header.classList.remove(
        "fixed",
        "top-0",
        "px-20",
        "w-full",
        "rounded-none",

        "z-50",
        "bg-opacity-50",
        "backdrop-blur-sm"
      );
    }
  });
    </script>
    <footer
        class="bg-[url('/resources/images/footer-bg.png')]   justify-between p-5 px-10 text-[#210e81] font-Readex   gap-10 flex-justify-between h-96 flex">
        <div class="flex flex-col text-sm gap-1">
            <a class="rounded-full  bg-white mx-auto border-secondary-light p-2" href="#">
                <img class="w-12" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" />
            </a>
            <p class="text-center mx-auto  w-1/2  p-2">
                {{ __('messages.footer_text')}}
            </p>
            <form class="flex flex-col w-1/2 mx-auto gap-2">
                <input type="email" placeholder="ادخل بريدك الإلكتروني"
                    class="border border-secondary-light rounded-lg px-4 py-2" />
           
                    <button class="bg-[#312363] text-white px-2 py-2 rounded-lg">
                        {{ __('messages.get_started')}}
                    </button>            </form>
            <div class="flex gap-1 mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                    <polygon fill="#616161" points="41,6 9.929,42 6.215,42 37.287,6"></polygon>
                    <polygon fill="#fff" fill-rule="evenodd" points="31.143,41 7.82,7 16.777,7 40.1,41"
                        clip-rule="evenodd"></polygon>
                    <path fill="#616161"
                        d="M15.724,9l20.578,30h-4.106L11.618,9H15.724 M17.304,6H5.922l24.694,36h11.382L17.304,6L17.304,6z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                    <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                    <path fill="#fff"
                        d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                    </path>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                    <path fill="#fff"
                        d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                    </path>
                    <path fill="#fff"
                        d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                    </path>
                    <path fill="#cfd8dc"
                        d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                    </path>
                    <path fill="#40c351"
                        d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                    </path>
                    <path fill="#fff" fill-rule="evenodd"
                        d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                        clip-rule="evenodd"></path>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                    <path fill="#212121" fill-rule="evenodd"
                        d="M10.904,6h26.191C39.804,6,42,8.196,42,10.904v26.191 C42,39.804,39.804,42,37.096,42H10.904C8.196,42,6,39.804,6,37.096V10.904C6,8.196,8.196,6,10.904,6z"
                        clip-rule="evenodd"></path>
                    <path fill="#ec407a" fill-rule="evenodd"
                        d="M29.208,20.607c1.576,1.126,3.507,1.788,5.592,1.788v-4.011 c-0.395,0-0.788-0.041-1.174-0.123v3.157c-2.085,0-4.015-0.663-5.592-1.788v8.184c0,4.094-3.321,7.413-7.417,7.413 c-1.528,0-2.949-0.462-4.129-1.254c1.347,1.376,3.225,2.23,5.303,2.23c4.096,0,7.417-3.319,7.417-7.413L29.208,20.607L29.208,20.607 z M30.657,16.561c-0.805-0.879-1.334-2.016-1.449-3.273v-0.516h-1.113C28.375,14.369,29.331,15.734,30.657,16.561L30.657,16.561z M19.079,30.832c-0.45-0.59-0.693-1.311-0.692-2.053c0-1.873,1.519-3.391,3.393-3.391c0.349,0,0.696,0.053,1.029,0.159v-4.1 c-0.389-0.053-0.781-0.076-1.174-0.068v3.191c-0.333-0.106-0.68-0.159-1.03-0.159c-1.874,0-3.393,1.518-3.393,3.391 C17.213,29.127,17.972,30.274,19.079,30.832z"
                        clip-rule="evenodd"></path>
                    <path fill="#fff" fill-rule="evenodd"
                        d="M28.034,19.63c1.576,1.126,3.507,1.788,5.592,1.788v-3.157 c-1.164-0.248-2.194-0.856-2.969-1.701c-1.326-0.827-2.281-2.191-2.561-3.788h-2.923v16.018c-0.007,1.867-1.523,3.379-3.393,3.379 c-1.102,0-2.081-0.525-2.701-1.338c-1.107-0.558-1.866-1.705-1.866-3.029c0-1.873,1.519-3.391,3.393-3.391 c0.359,0,0.705,0.056,1.03,0.159V21.38c-4.024,0.083-7.26,3.369-7.26,7.411c0,2.018,0.806,3.847,2.114,5.183 c1.18,0.792,2.601,1.254,4.129,1.254c4.096,0,7.417-3.319,7.417-7.413L28.034,19.63L28.034,19.63z"
                        clip-rule="evenodd"></path>
                    <path fill="#81d4fa" fill-rule="evenodd"
                        d="M33.626,18.262v-0.854c-1.05,0.002-2.078-0.292-2.969-0.848 C31.445,17.423,32.483,18.018,33.626,18.262z M28.095,12.772c-0.027-0.153-0.047-0.306-0.061-0.461v-0.516h-4.036v16.019 c-0.006,1.867-1.523,3.379-3.393,3.379c-0.549,0-1.067-0.13-1.526-0.362c0.62,0.813,1.599,1.338,2.701,1.338 c1.87,0,3.386-1.512,3.393-3.379V12.772H28.095z M21.635,21.38v-0.909c-0.337-0.046-0.677-0.069-1.018-0.069 c-4.097,0-7.417,3.319-7.417,7.413c0,2.567,1.305,4.829,3.288,6.159c-1.308-1.336-2.114-3.165-2.114-5.183 C14.374,24.749,17.611,21.463,21.635,21.38z"
                        clip-rule="evenodd"></path>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                    <path fill="#f44336"
                        d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5 V37z">
                    </path>
                    <path fill="#fff"
                        d="M36.499,25.498c-0.276-0.983-1.089-1.758-2.122-2.021C32.506,23,24,23,24,23s-8.506,0-10.377,0.478 c-1.032,0.263-1.846,1.037-2.122,2.021C11,27.281,11,31,11,31s0,3.719,0.501,5.502c0.276,0.983,1.089,1.758,2.122,2.021 C15.494,39,24,39,24,39s8.505,0,10.377-0.478c1.032-0.263,1.846-1.037,2.122-2.021C37,34.719,37,31,37,31S37,27.281,36.499,25.498z">
                    </path>
                    <path fill="#f44336"
                        d="M16.333 37L14.667 37 14.667 26.655 13 26.655 13 25 18 25 18 26.655 16.333 26.655zM23 37h-1.5l-.167-1.132C20.675 36.579 19.892 37 19.283 37c-.533 0-.908-.231-1.092-.653C18.083 36.083 18 35.687 18 35.092V27.5h1.667v7.757c.042.24.217.33.433.33.333 0 .867-.363 1.233-.843V27.5H23V37zM35 32.663v-2.701c0-.777-.192-1.338-.533-1.702-.458-.496-1.117-.76-1.942-.76-.842 0-1.492.264-1.967.76C30.2 28.623 30 29.218 30 29.995v4.593c0 .768.225 1.313.575 1.669C31.05 36.752 31.7 37 32.567 37c.858 0 1.533-.256 1.983-.785.2-.231.333-.496.392-.785C34.95 35.298 35 34.943 35 34.522h-1.667v.661c0 .38-.375.694-.833.694s-.833-.314-.833-.694v-2.52H35zM31.667 29.392c0-.388.375-.694.833-.694s.833.306.833.694v2.123h-1.667V29.392zM28.783 28.492c-.208-.646-.717-1.001-1.35-1.01-.808-.008-1.142.414-1.767 1.142V25H24v12h1.5l.167-1.034C26.192 36.611 26.875 37 27.433 37c.633 0 1.175-.331 1.383-.977.1-.348.175-.67.183-1.399V30.28C29 29.461 28.892 28.84 28.783 28.492zM27.333 34.41c0 .869-.2 1.167-.65 1.167-.258 0-.75-.174-1.017-.439v-5.686c.267-.265.758-.521 1.017-.521.45 0 .65.273.65 1.142V34.41z">
                    </path>
                    <path fill="#fff"
                        d="M15 9l1.835.001 1.187 5.712.115 0 1.128-5.711 1.856-.001L19 16.893V21h-1.823l-.003-3.885L15 9zM21.139 14.082c0-.672.219-1.209.657-1.606.437-.399 1.024-.6 1.764-.601.675 0 1.225.209 1.655.63.429.418.645.96.645 1.622l.003 4.485c0 .742-.209 1.326-.63 1.752C24.812 20.788 24.234 21 23.493 21c-.714 0-1.281-.221-1.712-.656-.428-.435-.64-1.023-.641-1.76l-.003-4.503L21.139 14.082 21.139 14.082zM22.815 18.746c0 .236.057.423.178.553.115.128.279.193.495.193.221 0 .394-.066.524-.201.129-.129.196-.314.196-.547l-.003-4.731c0-.188-.069-.342-.201-.459-.131-.116-.305-.175-.519-.175-.199 0-.361.06-.486.176-.124.117-.186.271-.186.459L22.815 18.746zM32 12v9h-1.425l-.227-1.1c-.305.358-.622.63-.953.815C29.067 20.901 28.747 21 28.437 21c-.384 0-.671-.132-.866-.394-.195-.259-.291-.65-.291-1.174L27.276 12h1.653l.004 6.825c0 .204.036.355.106.449.066.09.183.14.335.14.124 0 .278-.062.46-.186.188-.122.358-.281.512-.471L30.344 12 32 12z">
                    </path>
                </svg>
            </div>
        </div>

        <div class="flex text-[#210e81] flex-col gap-1 text-center">
            <p class="font-bold">{{__('messages.contact')}}</p>
            <div class="flex flex-col text-xs mt-5 font-Mada font-bold  text-primary gap-2">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                    <p>+966 123 456 789</p>
                </div>

                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>

                    <p>القاهرة - شارع الاهرام - حدائق القبة</p>
                </div>

                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                    </svg>

                    <p>example@example.com</p>
                </div>
            </div>
            <p class="font-bold">{{__('messages.contact')}}</p>
            <a href="#" class="text-xs  font-bold">{{__('messages.contact')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Home')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.About us')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Address')}}</a>
        </div>

        <div class="flex  flex-col gap-1 text-center">
            <p class="font-bold">{{__('messages.contact')}}</p>
            <a href="#" class="text-xs  font-bold">{{__('messages.contact')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Home')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.About us')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Address')}}</a>
            <p class="font-bold">{{__('messages.contact')}}</p>
            <a href="#" class="text-xs  font-bold">{{__('messages.contact')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Home')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.About us')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Address')}}</a>
            <p class="font-bold">{{__('messages.contact')}}</p>
            <a href="#" class="text-xs  font-bold">{{__('messages.contact')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Home')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.About us')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Address')}}</a>
        </div>

        <div class="flex  flex-col gap-1 text-center">
            <p class="font-bold">{{__('messages.contact')}}</p>
            <a href="#" class="text-xs  font-bold">{{__('messages.contact')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Home')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.About us')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Address')}}</a>
            <p class="font-bold">{{__('messages.contact')}}</p>
            <a href="#" class="text-xs  font-bold">{{__('messages.contact')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Home')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.About us')}}</a>
            <a href="#" class="text-xs  font-bold">{{__('messages.Address')}}</a>
        </div>

    </footer>
    <div class="bottom-0 bg-[#210e81] text-center text-white py-3">
       {{__('messages.copyright')}}
    </div>
</body>

</html>