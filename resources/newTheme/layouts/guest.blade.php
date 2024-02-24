<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
</head>
<x-auth-session-status class="mb-4" :status="session('status')" />
@vite(['resources/js/index.js','resources/js/helper.js'])

<body
    x-data="{ page: 'signin', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
    <!-- ===== Preloader Start ===== -->
    {{-- <x-admin.partials.preloader /> --}}
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">


            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    <!-- Breadcrumb Start -->
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-title-md2 font-bold text-black dark:text-white">
                            Sign In
                        </h2>

                        <nav>
                            <ol class="flex items-center gap-2">
                                <li>
                                    <a class="font-medium" href="index.html">Dashboard /</a>
                                </li>
                                <li class="font-medium text-primary">Sign In</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Breadcrumb End -->

                    <!-- ====== Forms Section Start -->
                    <div
                        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="flex flex-wrap items-center">
                            <div class="hidden w-full xl:block xl:w-1/2">
                                <div class="px-26 py-17.5 text-center">
                                    <a class="mb-5.5 inline-block" href="index.html">
                                        <img class="hidden dark:block" src="{{ Vite::asset('resources/images/logo/logo.svg') }}" alt="Logo" />
                                        <img class="dark:hidden" src="{{ Vite::asset('resources/images/logo/logo-dark.svg') }}" alt="Logo" />
                                    </a>

                                    <p class="font-medium 2xl:px-20">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        suspendisse.
                                    </p>

                                    <span class="mt-15 inline-block">
                                        <img src="{{ Vite::asset('resources/images/illustration/illustration-03.svg') }}" alt="illustration" />
                                    </span>
                                </div>
                            </div>

                            {{ $slot }}


                        </div>
                    </div>
                    <!-- ====== Forms Section End -->
                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
</body>

</html>

