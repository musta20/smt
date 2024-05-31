<x-main-layout :page="__('messages.Contact')">
    <x-coffee::layout.nav />

    <form class="p-5 flex flex-col justify-items-center w-4/5 m-auto align-baseline">


        <div  class="flex  flex-col w-3/4 p-5 gap-9 mx-auto ">
            <div class="rounded-sm bg-gray-50 shadow p-5 border-stroke  shadow-default ">
                <div class="border-b border-stroke px-6.5 py-4 border-slate-300">
                    <h3 class="font-medium text-black dark:text-white">
                        {{ __('messages.Contact us') }}
                    </h3>
                </div>
                <div class="flex  text-slate-600 p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <div class="w-full  p-5 xl:w-1/2">
                        {{ __('messages.Adress') }} : {{ $store->address }}
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">
                        {{ __('messages.Phone') }} : {{ $store->phone }}
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">
                        {{ __('messages.Email') }} : {{ $store->email }}
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">
                        <x-social-media :color="'#363636'" />

                    </div>
                </div>

                <div class="flex  p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <div class="w-full    p-5 xl:w-1/2">

                        <input type="text"  name="title" placeholder="{{ __('messages.first name') }}"
                            class="w-full border  border-[1.5px]  bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">

                    </div>
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" name="specialty" value="" placeholder="{{ __('messages.last name') }}"
                            class="w-full border  border-[1.5px]  bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                </div>



                <div class="flex  p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" multiple="" name="phone" value="" placeholder="{{ __('messages.phone number') }}"
                            class="border-slate-300  border w-full   border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" name="email" value="" placeholder="{{ __('messages.Email') }}"
                            class="w-full border border-slate-300   border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                </div>
                <div class="flex flex-col gap-5.5 p-6.5">

                    <textarea rows="6" name="Message" placeholder="{{ __('messages.Message Content') }}"
                        class="w-full p-5 border
                        border-slate-300    border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                      </textarea>



                </div>
                <div class="flex  p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <button type="submit"
                        class="bg-secondary hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-primary hover:border-blue-500 rounded">
                        {{ __('messages.Send') }}
                    </button>
                </div>

            </div>

            <!-- Toggle switch input -->
        </div>

    </form>


</x-main-layout>