<form x-ref='form' method="post" action="{{ route('admin.setting.updateSetting') }}" class=" p-5">
  @method('put')
  <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="flex justify-between border-b border-stroke px-6.5 py-4 dark:border-strokedark">
      <button type="submit"
        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        {{ __('messages.save changes') }}
      </button>
      <a href="{{ route('admin.dashboard') }}"
        class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
        {{ __('messages.cancel') }}

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
          {{ __('messages.Publishing and reviews options') }}


        </h3>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> {{ __('messages.Enable reviews') }}</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="CanReview" class="sr-only" wire:model='CanReview' />
              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.CanReview }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">{{ __('messages.Launch the store') }}</span>
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
          <span class="px-2">{{ __('messages.Enable about us page') }}</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showAboutPage" wire:model='showAboutPage' class="sr-only" />


              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.showAboutPage }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">{{ __('messages.Enable main banner slide') }}</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showCarousel" class="sr-only" wire:model='showCarousel' />

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
          <span class="px-2">{{ __('messages.Enable Term and conditions page') }}</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showTermPage" wire:model='showTermPage' class="sr-only" />


              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.showTermPage }"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
              </div>
            </div>
          </label>
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2"> {{ __('messages.Enable footer links') }}</span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="showFooterLinks" wire:model='showFooterLinks' class="sr-only" />


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
          <span class="px-2">{{ __('messages.Enable user registration') }}</span>
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
          <span class="px-2"> {{ __('messages.Enable categories link in header') }}</span>
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
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
        <div class="w-full xl:w-1/2 flex justify-end">
        </div>
        <div class="w-full xl:w-1/2 flex justify-end">
          <span class="px-2">{{ __('messages.Allow unregistered users to review') }} </span>
          <label class="flex cursor-pointer select-none items-center">
            <div class="relative">
              <input type="checkbox" name="OnlycustomerCanReview" wire:model='OnlycustomerCanReview' class="sr-only" />
              <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
              <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.OnlycustomerCanReview }"
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
          {{ __('messages.Extra details') }}
        </h3>
      </div>

      <div class="flex flex-col gap-5.5 p-6.5">
        <div>
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            {{ __('messages.Add Banner images') }}
          </label>
          <livewire:admin.file-manger :$subFiles wire:model='subFiles' />
        </div>
      </div>

      <div class="flex flex-col gap-5.5 p-6.5">
        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
          {{ __('messages.Term page content') }}
        </label>
        <textarea rows="6" name="TermPageContent" placeholder="{{ __('messages.Term page content') }}" class="w-full
                        @error('TermPageContent') !border-red-500 @enderror
                        rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition
                        focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark
                         dark:bg-form-input dark:text-white dark:focus:!border-primary">
                      {{ old('TermPageContent',$TermPageContent) }}
                    </textarea>
        <x-input-error :messages="$errors->get('TermPageContent')" class="mt-2" />
      </div>

      <div class="flex flex-col gap-5.5 p-6.5">
        <div>
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            {{ __('messages.About us page content') }}
          </label>
          <textarea rows="6" name="aboutPageContent" placeholder="{{ __('messages.Anout us page content') }}"
            class="w-full
                        @error('aboutPageContent') !border-red-500 @enderror
                        rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                      {{ old('aboutPageContent',$aboutPageContent) }}
                    </textarea>
          <x-input-error :messages="$errors->get('aboutPageContent')" class="mt-2" />
        </div>
      </div>

    </div>


  </div>

</form>