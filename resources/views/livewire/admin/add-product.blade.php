<div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
  <div class="flex flex-col gap-9">
    <!-- Input Fields -->
    {{-- @vite('resources/js/flowbite.js') --}}

    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
          بيانات المنتج
        </h3>
      </div>

      <div class="flex flex-col  h-70 gap-1 p-4 xl:flex-row">

        <div class="flex items-center justify-center m-2 w-3/4 ">
          <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 bg-slate-100 border-2 border-dashed  hover:border-primary hover:border-3 border-bodydark1  rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 ">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                  upload</span> or drag and drop</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
          </label>
        </div>

        <div class="bg-slate-200 rounded-lg p-2 text-sm w-1/3">
          * الصيغ المدعومة:
          <br>
          png, jpg, jpeg, gif
          <br>
          <br>

          * أبعاد الصور: 1000*1000
          <br>
          <br>

          * حجم الصورة لا يتجاوز: 5MB
        </div>




      </div>

      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">

        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            اسم المنتج
          </label>
          <input type="text" name="name" value="{{$product->name}}" placeholder="اسم المنتج"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
        </div>

        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            السعر
          </label>
          <input type="text" name="price" value="{{$product->price}}" placeholder="السعر"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
        </div>

      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">

        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            رابط الطلب
          </label>
          <input type="text" name="order_url" value="{{$product->order_url}}" placeholder="رابط الطلب"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
        </div>

        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            خصم (اختياري)
          </label>
          <input type="text" name="discount" value="{{$product->discount}}" placeholder="خصم"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
        </div>

      </div>



      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">

        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            السعر القديم

            (اختياري)
          </label>
          <input type="text" name="older_price" value="{{$product->older_price}}" placeholder="السعر القديم"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
        </div>

        <div class="w-full xl:w-1/2">
        </div>

      </div>

      <div class="p-6.5 xl:flex-row">
        <label class=" w-2/3  flex justify-between mb-3 block gap-1 text-sm font-medium text-black dark:text-white">
          <span class="py-1.5"> التصنيفات :</span>
          <div x-data="{ isOpen: false }"
            class="relative divide-y divide-gray-3 border border-gray-3 rounded-s-lg shadow w-35 dark:bg-gray-700">
            <button @click.prevent="isOpen = !isOpen"
              class="w-full inline-flex items-center gap-1.5 justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
              إضافة

              <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 12h14m-7 7V5" />
              </svg>

            </button>

            <div @click.outside="isOpen = false" x-show="isOpen"
              class="absolute shadow right-0 bottom-full z-1 mb-1 w-full max-w-39.5 rounded-[5px] bg-white py-2.5 shadow-12 dark:bg-boxdark "
              style="display: none;">

              @foreach ($category as $item)
              <button
                class="flex w-full px-4 py-4 justify-center text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4"
                wire:key="{{$item->id}}" wire:click="addCategory('{{$item->id}}'); isOpen = false">

                {{$item->name}}
              </button>
              @endforeach



            </div>
          </div>


        </label>
        <div class="w-2/3 min-h-20  rounded-md border-dashed p-5 border-bodydark1 bg-gray dark:border-strokedark ">
          @foreach ($productCategorys as $cat)
          <span wire:key="{{$cat}}"
            class="inline-flex items-center px-2 py-1 mt-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
            {{$category->find($cat)->name}}
            <button type="button" wire:click="removeCategory('{{$cat}}')"
              class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300">
              <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>

            </button>
          </span>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Toggle switch input -->


  </div>

  <div  class="flex flex-col gap-9">
    <div dir="ltr" class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
          خيارات النشر و التقييم
        </h3>
      </div>

    
   

      <div  class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">

          <span class="px-2"> السماح بتقييم المنتج</span>

          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" class="sr-only" wire:click="settoogle(1)" />
              <div class="block h-8 w-14 rounded-full  bg-meta-9 dark:bg-[#5A616B]"></div>
              <div
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition {{$switcherToggle[1] ? '!right-1 !translate-x-full !bg-primary dark:!bg-white':''}}">
              </div>
            </div>
          </label>

        </div>

        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> إظهار المنتج</span>

          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" class="sr-only" wire:click="settoogle(0)" />
              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div
              class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition {{$switcherToggle[0] ? '!right-1 !translate-x-full !bg-primary dark:!bg-white':''}}">
            </div>
            </div>
          </label>


        </div>



      </div>


      <div  class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">

        <div class="w-full xl:w-1/2 flex justify-end">

        </div>

        <div class="w-full xl:w-1/2 flex justify-end">

          <span class="px-2"> السماح بالتعليقات</span>

          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" class="sr-only" wire:click="settoogle(2)" />
              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div 
              class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition {{$switcherToggle[2] ? '!right-1 !translate-x-full !bg-primary dark:!bg-white':''}}">
            </div>
            </div>
          </label>

        </div>

      </div>




    </div>

    <!-- Textarea Fields -->
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
          تفاصيل اضافية للمنتج
        </h3>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5">
        <div>
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            وصف المنتج
          </label>
          <textarea rows="6" name="description" placeholder="وصف المنتج"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
            {{$product->description}}
          </textarea>
        </div>



        <div>
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            اضافة المزيد من صور المنتج
          </label>
          <textarea rows="6" disabled="" placeholder="Disabled textarea"
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary dark:disabled:bg-black"></textarea>
        </div>












      </div>


    </div>


  </div>




</div>