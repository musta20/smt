<div>
    <div x-data
      class="rounded-sm border border-stroke bg-white my-3 shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="flex justify-between border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <div>
          <x-modal>
            <span class="mx-auto inline-block">
              <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.1" width="60" height="60" rx="30" fill="#DC2626"></rect>
                <path
                  d="M30 27.2498V29.9998V27.2498ZM30 35.4999H30.0134H30ZM20.6914 41H39.3086C41.3778 41 42.6704 38.7078 41.6358 36.8749L32.3272 20.3747C31.2926 18.5418 28.7074 18.5418 27.6728 20.3747L18.3642 36.8749C17.3296 38.7078 18.6222 41 20.6914 41Z"
                  stroke="#DC2626" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
            <h3 class="mt-5.5 p-5 text-xl font-bold text-black dark:text-white sm:text-2xl">
              هل انت متاكد من حذف المنتج
            </h3>
            <form method="post" action="{{ route('admin.product.destroy',$product->id) }}"
              class="-mx-3 flex flex-wrap gap-y-4">
              @csrf
              @method('delete')

              <div class="w-full px-3 2xsm:w-1/2">
                <button type="submit"
                  class="block w-full rounded border border-meta-1 bg-meta-1 p-3 text-center font-medium text-white transition hover:bg-opacity-90">
                  حذف
                </button>
              </div>


              <div class="w-full px-3 2xsm:w-1/2">
                <button @click.prevent="modalOpen = false"
                  class="block w-full rounded border border-stroke bg-gray p-3 text-center font-medium text-black transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:bg-meta-4 dark:text-white dark:hover:border-meta-1 dark:hover:bg-meta-1">
                  الغاء
                </button>
              </div>

            </form>
          </x-modal>
          {{-- <div @modalindow.window="alert('mom');"></div> --}}
          <button @click="$refs.form.submit()"
            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            حفظ التغيرات
          </button>
          <button @click="$dispatch('modalbox', { message: 'Hello World!' });"
            class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
            حذف
          </button>

        </div>

        <a class="font-medium text-black dark:text-white hover:underline py-1" href="{{route('admin.product.index')}}">
          قائمة المنتجات
        </a>
      </div>


    </div>
    <form x-ref='form' method="POST" action="{{route('admin.product.update',$product->id)}}"
      class="grid grid-cols-1 gap-9 sm:grid-cols-2">
      @method('PUT')

      @csrf

      <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
          <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
              بيانات المنتج
            </h3>
          </div>
          <div class=" p-4 xl:flex-row">
            <div class="w-full xl:w-1/2">
              <label class=" text-sm font-medium text-black dark:text-white">
                صورة المنتج الاساسية
              </label>
            </div>
          </div>
          <div x-data="{showCancle:false}" class="flex items-center justify-center  m-2 ">

            @if ($product->image)
            <div @mouseenter="showCancle=true" @mouseleave="showCancle=false" class=" rounded-lg relative   ">
              <img :class="{'blur-sm' : showCancle==true}" class="rounded-lg  object-contain "
                src="{{tenant_asset('media/'.$product->image)}}" />
              <button wire:click.prevent="removeImage" x-show="showCancle"
                class="absolute bg-white hover:bg-slate-200 rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <svg class="w-10 h-10 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 18 6m0 12L6 6" />
                </svg>
              </button>
            </div>
            @else
            <div x-data="{ uploading: false,fileLoded:false, progress: 0  }" x-ref="dnd" class="relative flex  flex-col items-center justify-center w-full min-h-100 border-2 border-dashed  hover:border-primary hover:border-3 bg-slate-50 rounded-lg 
                      bg-gray-50 hover:bg-gray-100 ">
              <input wire:model='photo' id="dropzone-file" type="file"
                class="absolute h-full w-full opacity-0 cursor-pointer" for="dropzone-file"
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
                    إضغط او اسحب هنا لرفع الصور
                  </span>
                </p>
                <p>
                  صيغ الصور المعتمده (PNG, JPG or GIF)
                </p>
                <p>
                  الابعاد (800x400px)
                </p>
                @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
              <div x-show="uploading"
                class="w-1/2 bg-gray-200 rounded-full text-lg mb-1 font-medium h-3 dark:bg-gray-700">
                <div class="bg-blue-600  rounded-full text-white text-center transition-width" x-text="progress+'%'"
                  x-bind:style="progress && { width : progress+'%' }"></div>
              </div>
            </div>
            @endif
          </div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
            <div class="w-full xl:w-1/2">
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                اسم المنتج
              </label>
              <input type="text" name="name" value="{{old('name',$product->name)}}" placeholder="اسم المنتج"
                class=" @error('name') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="w-full xl:w-1/2">
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                السعر
              </label>
              <input type="text" name="price" value="{{old('price',$product->price)}}" placeholder="السعر"
                class="w-full @error('price') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
              <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
          </div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
            <div class="w-full xl:w-1/2">
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                رابط الطلب
              </label>
              <input type="text" value="{{old('order_url',$product->order_url)}}" name="order_url"
                placeholder="رابط الطلب"
                class="w-full @error('order_url') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
              <x-input-error :messages="$errors->get('order_url')" class="mt-2" />
            </div>
            <div class="w-full xl:w-1/2">
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                خصم (اختياري)
              </label>
              <input type="text" name="discount" value="{{old('discount',$product->discount)}}" placeholder="خصم"
                class="w-full @error('discount') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
              <x-input-error :messages="$errors->get('discount')" class="mt-2" />

            </div>
          </div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
            <div class="w-full xl:w-1/2">
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                السعر القديم
                (اختياري)
              </label>
              <input type="text" name="older_price" value="{{old('older_price',$product->older_price)}}"
                placeholder="السعر القديم"
                class="w-full @error('older_price') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
              <x-input-error :messages="$errors->get('older_price')" class="mt-2" />
            </div>
            <div class="w-full xl:w-1/2">
            </div>
          </div>
          <div class="p-6.5 xl:flex-row">
            <label class="  flex justify-between mb-3 block gap-1 text-sm font-medium text-black dark:text-white">
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
                <div @click.outside.prevent="isOpen = false" x-show="isOpen"
                  class="absolute shadow right-0 bottom-full z-1 mb-1 w-full max-w-39.5 rounded-[5px] bg-white py-2.5 shadow-12 dark:bg-boxdark "
                  style="display: none;">
                  @foreach ($category as $item)
                  <button
                    class="flex w-full px-4 py-4 justify-center text-sm hover:bg-whiter hover:text-primary dark:hover:bg-meta-4"
                    wire:key="{{$item->id}}" wire:click.prevent="addCategory('{{$item->id}}'); isOpen = false">
                    {{$item->name}}
                  </button>
                  @endforeach
                </div>
              </div>
            </label>
            <div class=" min-h-20  rounded-md border-dashed p-5 border-bodydark1 bg-gray dark:border-strokedark ">
              @foreach ($productCategorys as $cat)
              <span wire:key="{{$cat}}"
                class="inline-flex items-center px-2 py-1 mt-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                {{$category->find($cat)->name}}
                <input hidden name="category[]" value="{{$cat}}" />
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
              خيارات النشر و التقييم
            </h3>
          </div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row ">
            <div class="w-full xl:w-1/2 flex justify-end">
              <span class="px-2"> السماح بتقييم المنتج</span>
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
              <span class="px-2"> إظهار المنتج</span>
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
            <div class="w-full xl:w-1/2 flex justify-end">
      
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
                class="w-full 
                          @error('description') !border-red-500 @enderror
                          rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                        {{old('description',$product->description)}}
                      </textarea>
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
              <label class=" block text-sm font-medium text-black dark:text-white">
                اضافة المزيد من صور المنتج
              </label>
              <livewire:admin.file-manger :$subFiles :$product />
            </div>
          </div>
        </div>
      </div>
    </form>

</div>