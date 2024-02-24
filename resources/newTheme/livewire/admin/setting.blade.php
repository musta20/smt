<form x-ref='form' method="post" action="{{route('admin.setting.updateSetting')}}" class=" p-5">
  @method('put')
  <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="flex justify-between border-b border-stroke px-6.5 py-4 dark:border-strokedark">
      <button type="submit"
        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        حفظ التغيرات
      </button>
      <a href="{{route('admin.dashboard')}}"
        class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
        الغاء
      </a>
    </div>
  </div>
  @method('put')
  @csrf
  <div x-data class="flex flex-col gap-9">
    <div dir="ltr"
      class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 dir="rtl" class="font-medium text-black dark:text-white">
          خيارات النشر و التقييم
        </h3>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> السماح بتقييم المنتجات</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="CanReview" class="sr-only" wire:model='CanReview' />
              <div class="block h-8 w-14 rounded-full  bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.CanReview }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">تشغيل المتجر</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="siteStatus" class="sr-only" wire:model='siteStatus' />
              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.siteStatus }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">السماح بالتعليقات </span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="CanComment" class="sr-only" 
              wire:model='CanComment' />
              <div class="block h-8 w-14 rounded-full  bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.CanComment }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> عروض علانية في الصفحة الرئسيسة </span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showCarousel" class="sr-only"
               wire:model='showCarousel' />

              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.showCarousel }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">صفحة الشروط و الاحكام</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" 
              name="showTermPage" wire:model='showTermPage' class="sr-only" />


              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.showTermPage }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> السماح بالروابط اسفل المتجر</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showFooterLinks" 
              wire:model='showFooterLinks' class="sr-only" />


              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.showFooterLinks }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">السمحاح بحسابات الزبائن</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="AllowUsers" wire:model='AllowUsers' class="sr-only" />


              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.AllowUsers }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> اظهار روابط التصنيفات اعلى المتجر</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showHeadrLinks" wire:model='showHeadrLinks' class="sr-only" />


              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.showHeadrLinks }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
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
          تفاصيل اضافية
        </h3>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5">
        <div>
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            الشروط و الاحكام
          </label>
          <textarea rows="6" name="TermPageContent" placeholder="وصف المنتج"
            class="w-full 
                        @error('TermPageContent') !border-red-500 @enderror
                        rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                      {{old('TermPageContent',$TermPageContent)}}
                    </textarea>
          <x-input-error :messages="$errors->get('TermPageContent')"
             class="mt-2" />
        </div>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5">
        <div>
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
          إضافة صور عروض إعلانية
          </label>
          <livewire:admin.file-manger :$subFiles wire:model='subFiles' />
        </div>
      </div>
    </div>


  </div>

</form>