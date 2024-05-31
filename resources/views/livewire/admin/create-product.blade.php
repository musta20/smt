<div>
  <div x-data
    class="rounded-sm border border-stroke bg-white my-3 shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="flex justify-between border-b border-stroke px-6.5 py-4 dark:border-strokedark">
      <div>

        <button @click="$refs.form.submit()"
          class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
          {{ __('messages.save') }}
        </button>
        <button
          class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
          {{ __('messages.Cancel') }}
        </button>

      </div>
      <a class="font-medium text-black dark:text-white hover:underline py-1" href="{{ route('admin.product.index') }}">
        {{ __('messages.Products list') }}
      </a>
    </div>
  </div>
  <form x-ref='form' method="post" enctype="multipart/form-data" action="{{ route('admin.product.store') }}"
    class="grid grid-cols-1 gap-9 sm:grid-cols-2">
    @csrf
    <div class="flex flex-col gap-9">
      <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
          <h3 class="font-medium text-black dark:text-white">
            {{ __('messages.Product Details') }}
          </h3>
        </div>
        <div class=" p-4 xl:flex-row">
          <div class="w-full xl:w-1/2">
            <label class=" text-sm font-medium text-black dark:text-white">
              {{ __('messages.Main product image') }}
            </label>
          </div>
        </div>
        <div x-data="{showCancle:false}" class="flex items-center justify-center  m-2 ">
          @if ($photo)
          <div @mouseenter="showCancle=true" @mouseleave="showCancle=false" class=" rounded-lg relative   ">
            <img :class="{'blur-sm' : showCancle==true}" class="rounded-lg  object-contain "
              src="{{ $photo->temporaryUrl() }}" />
            <button wire:click.prevent="removeImage" x-show="showCancle"
              class="absolute bg-white hover:bg-slate-200 rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
              <svg class="w-10 h-10 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18 18 6m0 12L6 6" />
              </svg>
            </button>
          </div>
          @endif
          <div x-data="{ uploading: false , fileLoded:false , progress: 0  }" x-ref="dnd" class=" {{ $photo ? 'hidden':'' }} relative flex  flex-col items-center justify-center w-full min-h-100 border-2 border-dashed  hover:border-primary hover:border-3 bg-slate-50 rounded-lg
                      bg-gray-50 hover:bg-gray-100 ">

            <input wire:model='photo' type="file" name="image" class="absolute h-full w-full opacity-0 cursor-pointer"
              x-on:livewire-upload-start="uploading = true"
              x-on:livewire-upload-finish="uploading = false;fileLoded=true"
              x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
              x-on:livewire-upload-progress="progress = $event.detail.progress"
              @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
              @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
              @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');" />


            <div x-show="!uploading" class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold">
                  {{ __('messages.click here or drag') }}
                </span>
              </p>
              <p>
                {{ __('messages.Supported image formats ') }}(PNG, JPG or GIF)
              </p>
              <p>
                {{ __('messages.size') }} (800x400px)
              </p>
              @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div x-show="uploading"
              class="w-1/2 bg-gray-200 rounded-full text-lg mb-1 font-medium h-3 dark:bg-gray-700">
              <div class="bg-blue-600  rounded-full text-white text-center transition-width" x-text="progress+'%'"
                x-bind:style="progress && { width : progress+'%' }"></div>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
          <div class="w-full xl:w-1/2">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
              {{ __('messages.product name') }}
            </label>
            <input type="text" multiple name="name" value="{{ old('name') }}" placeholder="{{ __('messages.product name') }} "
              class=" @error('name') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="w-full xl:w-1/2">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
              {{ __('messages.price') }}
            </label>
            <input type="text" name="price" value="{{ old('price') }}" placeholder="{{ __('messages.price') }} "
              class="w-full @error('price') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>
        </div>
        <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
          <div class="w-full xl:w-1/2">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
              {{ __('messages.order url') }}
            </label>
            <input type="text" value="{{ old('order_url') }}" name="order_url" placeholder="{{ __('messages.order url') }} "
              class="w-full @error('order_url') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
            <x-input-error :messages="$errors->get('order_url')" class="mt-2" />
          </div>
          <div class="w-full xl:w-1/2">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
              {{ __('messages.discount') }} ({{ __('messages.optinal') }} )
            </label>
            <input type="text" name="discount"
             value="{{ old('discount') }}" placeholder="{{ __('messages.discount') }} "
              class="w-full @error('discount') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
            <x-input-error :messages="$errors->get('discount')" class="mt-2" />

          </div>
        </div>
        <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
          <div class="w-full xl:w-1/2">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
              {{ __('messages.old price') }}
              ({{ __('messages.optinal') }} )
            </label>
            <input type="text" name="older_price" value="{{ old('older_price') }}" placeholder="{{ __('messages.old price') }}"
              class="w-full @error('older_price') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
            <x-input-error :messages="$errors->get('older_price')" class="mt-2" />
          </div>
          <div class="w-full xl:w-1/2">
          </div>
        </div>
        <div class="p-6.5 xl:flex-row">
          <label class="  flex justify-between mb-3 block gap-1 text-sm font-medium text-black dark:text-white">
            <span class="py-1.5"> {{ __('messages.categories') }} :</span>
            <div x-data="{ isOpen: false }"
              class="relative divide-y divide-gray-3 border border-gray-3 rounded-s-lg shadow w-35 dark:bg-gray-700">
              <button @click.prevent="isOpen = !isOpen"
                class="w-full inline-flex items-center gap-1.5 justify-center py-1.5 text-sm text-black  hover:text-primary dark:bg-meta-4 dark:text-white dark:shadow-none">
                {{ __('messages.add') }}

                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
                </svg>
              </button>
              <div @click.outside.prevent="isOpen = false" x-show="isOpen"
                class="absolute shadow right-0 bottom-full z-1 mb-1 w-full max-w-39.5 rounded-[5px] bg-white py-2.5 shadow-12 dark:bg-boxdark "
                style="display: none;">
                @foreach ($categories as $item)
                <button
                  class="flex w-full px-4 py-4 justify-center text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4"
                  wire:key="{{ $item->id }}" wire:click.prevent="addCategory('{{ $item->id }}'); isOpen = false">
                  {{ $item->name }}
                </button>
                @endforeach
              </div>
            </div>
          </label>
          <div class=" min-h-20  rounded-md border-dashed p-5 border-bodydark1 bg-gray dark:border-strokedark ">
            @foreach ($productCategorys as $cat)
            <span wire:key="{{ $cat }}"
              class="inline-flex items-center px-2 py-1 mt-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
              {{ $categories->find($cat)->name }}
              <input hidden name="category[]" value="{{ $cat }}" />
              <button type="button" wire:click="removeCategory('{{ $cat }}')"
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
          @error('category') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>
      </div>
      <!-- Toggle switch input -->
    </div>
    <div x-data class="flex flex-col gap-9">
      <div dir="ltr"
        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
          <h3 class="font-medium text-black dark:text-white">
            {{ __('messages.Publishing and reviews options') }}
          </h3>
        </div>
        <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
          <div class="w-full xl:w-1/2 flex justify-end">
            <span class="px-2">
              {{ __('messages.Allow review for this product') }}

            </span>
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
            <span class="px-2">

              {{ __('messages.publish this product') }}

            </span>
            <label class="flex cursor-pointer select-none items-center">
              <div class="relative">
                <input type="checkbox" name="status" class="sr-only" wire:model='status' />

                <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
                <div :class="{  '!right-1 !translate-x-full !bg-primary dark:!bg-white': $wire.status }"
                  class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition ">
                </div>
              </div>
            </label>
          </div>
        </div>
        <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
          <div class="w-full xl:w-1/2 flex justify-end">
          </div>

        </div>
      </div>

      <!-- Textarea Fields -->
      <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
          <h3 class="font-medium text-black dark:text-white">
            {{ __('messages.Additional product details') }}

          </h3>
        </div>
        <div class="flex flex-col gap-5.5 p-6.5">
          <div>
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
              {{ __('messages.description') }}
              ({{ __('messages.optinal') }})
            </label>
            <textarea rows="6" name="description" placeholder=" {{ __('messages.description') }}"
              class="w-full
                      @error('description') !border-red-500 @enderror
                      rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                    {{ old('description') }}
                  </textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
          </div>
          <div>
            <label class=" block text-sm font-medium text-black dark:text-white">
              {{ __('messages.Add more image') }}
            </label>
            <livewire:admin.file-manger :$subFiles wire:model='subFiles' />
          </div>
        </div>
      </div>
    </div>
  </form>

</div>