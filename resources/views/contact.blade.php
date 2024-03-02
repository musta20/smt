<x-main-layout>

    <form class="p-5 flex flex-col justify-items-center align-baseline">


        <div  class="flex flex-col w-3/4 p-5 gap-9 mx-auto">
            <div class="rounded-sm border p-5 border-stroke bg-white shadow-default ">
                <div class="border-b border-stroke px-6.5 py-4 border-slate-300">
                    <h3 class="font-medium text-black dark:text-white">
                        تواصل معنا
                    </h3>
                </div>
                <div class="flex  text-slate-600 p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <div class="w-full  p-5 xl:w-1/2">
                        العنوان : {{$store->address}}
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">
                        الهاتف : {{$store->phone}}
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">
                        الهاتف : {{$store->phone}}
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">
                        <x-social-media :color="'#363636'" />

                    </div>
                </div>

                <div class="flex  p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" multiple="" name="title" placeholder="الاسم الاول"
                            class="   w-full rounded-lg  border-[1.5px] border-stroke 
                            border-slate-300
                            bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" name="specialty" value="" placeholder="الاسم الاخير"
                            class="w-full border-slate-300  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                </div>



                <div class="flex  p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" multiple="" name="phone" value="" placeholder="رقم الهاتف"
                            class="border-slate-300   w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                    <div class="w-full  p-5 xl:w-1/2">

                        <input type="text" name="email" value="" placeholder="البريد الاكتروني"
                            class="w-full border-slate-300  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    </div>
                </div>
                <div class="flex flex-col gap-5.5 p-6.5">

                    <textarea rows="6" name="description" placeholder="نص الرسالة"
                        class="w-full p-5
                        border-slate-300   rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                      </textarea>



                </div>
                <div class="flex  p-2 flex-col gap-5.5 p-6.5 xl:flex-row">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        إرسال
                    </button>
                </div>

            </div>

            <!-- Toggle switch input -->
        </div>

    </form>


</x-main-layout>