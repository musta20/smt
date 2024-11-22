<x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="w-full border-stroke dark:border-strokedark  xl:border-l-2">
        <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
            <span class="mb-1.5 block font-medium"> {{ __('messages.Forgot your password? No problem. Just let us know your email') }}

            </span>
            <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
            </h2>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-4">
                    <label class="mb-2.5 block font-medium text-black dark:text-white"
                        :value="__('messages.Email')">{{ __('messages.Email') }}</label>
                    <div class="relative">
                        <input type="email" :value="old('email')" placeholder="{{ __('messages.Email') }}" name="email"
                            class="w-full  rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <span class="absolute right-4 top-4">
                            <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path
                                        d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
                                        fill="" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>



                <div class="mb-5">
                    <input type="submit" value="{{ __('messages.Send') }}"
                        class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" />
                </div>



            </form>
        </div>
    </div>
</x-guest-layout>