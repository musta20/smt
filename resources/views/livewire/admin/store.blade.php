<form x-ref='form' method="post" action="{{route('admin.store.update',$store->id)}}" class=" p-5">
  <div class="flex flex-col p-5 gap-9">
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


  </div>
  @method('put')
  @csrf
  <div class="flex flex-col p-5 gap-9">
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
          إعدادادة المتجر الاساسية
        </h3>
      </div>
      <div class=" p-4 xl:flex-row">
        <div class="w-full  xl:w-1/2">
          <label class=" text-sm font-medium text-black dark:text-white">
            شعار الموقع
          </label>
        </div>
      </div>
      <div x-data="{showCancle:false}" class="flex items-center justify-center   text-sm   m-2 ">
        @if ($store->logo)
        <div @mouseenter="showCancle=true" @mouseleave="showCancle=false" class="w-4/12 rounded-lg relative   ">
          <img :class="{'blur-sm' : showCancle==true}" wire:model='photo' class="rounded-lg  object-contain "
            src="{{tenant_asset('media/'.$store->logo)}}" />
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
        <div x-data="{ uploading: false , fileLoded:false , progress: 0  }" x-ref="dnd" class=" {{$photo ? 'hidden':'' }} relative flex  flex-col items-center justify-center   border-2 border-dashed
            hover:border-primary hover:border-3 bg-slate-50 rounded-lg 
                  bg-gray-50 hover:bg-gray-100 w-2/12 h-2/12">

          <input wire:model='photo' type="file" name="image"
            class="absolute w-full opacity-0 cursor-pointer h-2/12 text-sm"
            x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false;fileLoded=true"
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
            <p class="mb-2 text-gray-500 dark:text-gray-400">
              <span class="font-semibold">
                إضغط او اسحب هنا لرفع الصور
              </span>
            </p>
            <p>
              (PNG, JPG or GIF)
            </p>
            <p>
              الابعاد (800x400px)
            </p>
            @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
          </div>

          <div x-show="uploading" class="w-1/2 bg-gray-200 rounded-full text-lg mb-1 font-medium h-3 dark:bg-gray-700">
            <div class="bg-blue-600  rounded-full text-white text-center transition-width" x-text="progress+'%'"
              x-bind:style="progress && { width : progress+'%' }"></div>
          </div>
        </div>
        @endif

      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            اسم المتجر
          </label>
          <input type="text" multiple name="title" value="{{old('title',$store->title)}}" placeholder="اسم المتجر"
            class=" @error('title') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
          <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            تخصص المتجر
          </label>
          <input type="text" name="specialty" value="{{old('specialty',$store->specialty)}}"
            placeholder="الحواسيب - اكسسورات الكمبيوتر"
            class="w-full @error('specialty') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
          <x-input-error :messages="$errors->get('specialty')" class="mt-2" />
        </div>
      </div>
      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            عنوان المتجر
          </label>
          <input type="text" value="{{old('adress',$store->adress)}}" name="adress"
            placeholder=" القاهرة - حدائق الإهرام"
            class="w-full @error('adress') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
          <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>
        <div class="w-full xl:w-1/2 ">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            تبويب شعار
          </label>
          <div class="flex ">
            <input type="file" wire:model='faviconImge' class="w-3/4"
              class="w-full @error('favicon') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />

            @if (!$store->favicon )
            <span>no image</span>
            @else
            <img src="{{tenant_asset('media/'.$store->favicon)}}" width="50" height="50" alt="">
            @endif
          </div>
          <x-input-error :messages="$errors->get('favicon')" class="mt-2" />

        </div>
      </div>


      <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            رقم الهاتف
          </label>
          <input type="text" multiple name="phone" value="{{old('phone',$store->phone)}}" placeholder="رقم الهاتف"
            class=" @error('phone') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
          <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="w-full xl:w-1/2">
          <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            البريد الاكتروني
          </label>
          <input type="text" name="email" value="{{old('email',$store->email)}}" placeholder="البريد الاكتروني"
            class="w-full @error('email') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      </div>

    </div>
    <!-- Toggle switch input -->
  </div>
  <div x-data class="flex p-5 flex-col gap-9">


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
            وصف المتجر
          </label>
          <textarea rows="6" name="description" placeholder=" وصف المتجر"
            class="w-full 
                    @error('description',$store->description) !border-red-500 @enderror
                    rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary">
                  {{old('description')}}
                </textarea>
          <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
            <div class="w-full xl:w-1/2">

              <div class="relative w-full">

                <input type="text" multiple name="tiktok" value="{{old('tiktok',$SocialMedia->TIKTOK)}}" placeholder="حساب تيك توك"
                  class="ps-10 @error('tiktok') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />

                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                      d="M 9 4 C 6.2495759 4 4 6.2495759 4 9 L 4 41 C 4 43.750424 6.2495759 46 9 46 L 41 46 C 43.750424 46 46 43.750424 46 41 L 46 9 C 46 6.2495759 43.750424 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.671576 6 44 7.3284241 44 9 L 44 41 C 44 42.671576 42.671576 44 41 44 L 9 44 C 7.3284241 44 6 42.671576 6 41 L 6 9 C 6 7.3284241 7.3284241 6 9 6 z M 26.042969 10 A 1.0001 1.0001 0 0 0 25.042969 10.998047 C 25.042969 10.998047 25.031984 15.873262 25.021484 20.759766 C 25.016184 23.203017 25.009799 25.64879 25.005859 27.490234 C 25.001922 29.331679 25 30.496833 25 30.59375 C 25 32.409009 23.351421 33.892578 21.472656 33.892578 C 19.608867 33.892578 18.121094 32.402853 18.121094 30.539062 C 18.121094 28.675273 19.608867 27.1875 21.472656 27.1875 C 21.535796 27.1875 21.663054 27.208245 21.880859 27.234375 A 1.0001 1.0001 0 0 0 23 26.240234 L 23 22.039062 A 1.0001 1.0001 0 0 0 22.0625 21.041016 C 21.906673 21.031216 21.710581 21.011719 21.472656 21.011719 C 16.223131 21.011719 11.945313 25.289537 11.945312 30.539062 C 11.945312 35.788589 16.223131 40.066406 21.472656 40.066406 C 26.72204 40.066409 31 35.788588 31 30.539062 L 31 21.490234 C 32.454611 22.653646 34.267517 23.390625 36.269531 23.390625 C 36.542588 23.390625 36.802305 23.374442 37.050781 23.351562 A 1.0001 1.0001 0 0 0 37.958984 22.355469 L 37.958984 17.685547 A 1.0001 1.0001 0 0 0 37.03125 16.6875 C 33.886609 16.461891 31.379838 14.012216 31.052734 10.896484 A 1.0001 1.0001 0 0 0 30.058594 10 L 26.042969 10 z M 27.041016 12 L 29.322266 12 C 30.049047 15.2987 32.626734 17.814404 35.958984 18.445312 L 35.958984 21.310547 C 33.820114 21.201935 31.941489 20.134948 30.835938 18.453125 A 1.0001 1.0001 0 0 0 29 19.003906 L 29 30.539062 C 29 34.707538 25.641273 38.066406 21.472656 38.066406 C 17.304181 38.066406 13.945312 34.707538 13.945312 30.539062 C 13.945312 26.538539 17.066083 23.363182 21 23.107422 L 21 25.283203 C 18.286416 25.535721 16.121094 27.762246 16.121094 30.539062 C 16.121094 33.483274 18.528445 35.892578 21.472656 35.892578 C 24.401892 35.892578 27 33.586491 27 30.59375 C 27 30.64267 27.001859 29.335571 27.005859 27.494141 C 27.009759 25.65271 27.016224 23.20692 27.021484 20.763672 C 27.030884 16.376775 27.039186 12.849206 27.041016 12 z">
                    </path>
                  </svg>
                </div>
              </div>


              <x-input-error :messages="$errors->get('tiktok')" class="mt-2" />
            </div>
            <div class="w-full xl:w-1/2">
              <div class="relative w-full">

                <input type="text" name="telegram" value="{{old('telegram',$SocialMedia->INSTAGRAM)}}" placeholder="حساب تلغرام"
                  class="ps-10 w-full @error('telegram') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />

                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                      d="M 44.376953 5.9863281 C 43.889905 6.0076957 43.415817 6.1432497 42.988281 6.3144531 C 42.565113 6.4845113 40.128883 7.5243408 36.53125 9.0625 C 32.933617 10.600659 28.256963 12.603668 23.621094 14.589844 C 14.349356 18.562196 5.2382813 22.470703 5.2382812 22.470703 L 5.3046875 22.445312 C 5.3046875 22.445312 4.7547875 22.629122 4.1972656 23.017578 C 3.9185047 23.211806 3.6186028 23.462555 3.3730469 23.828125 C 3.127491 24.193695 2.9479735 24.711788 3.015625 25.259766 C 3.2532479 27.184511 5.2480469 27.730469 5.2480469 27.730469 L 5.2558594 27.734375 L 14.158203 30.78125 C 14.385177 31.538434 16.858319 39.792923 17.402344 41.541016 C 17.702797 42.507484 17.984013 43.064995 18.277344 43.445312 C 18.424133 43.635633 18.577962 43.782915 18.748047 43.890625 C 18.815627 43.933415 18.8867 43.965525 18.957031 43.994141 C 18.958531 43.994806 18.959437 43.99348 18.960938 43.994141 C 18.969579 43.997952 18.977708 43.998295 18.986328 44.001953 L 18.962891 43.996094 C 18.979231 44.002694 18.995359 44.013801 19.011719 44.019531 C 19.043456 44.030655 19.062905 44.030268 19.103516 44.039062 C 20.123059 44.395042 20.966797 43.734375 20.966797 43.734375 L 21.001953 43.707031 L 26.470703 38.634766 L 35.345703 45.554688 L 35.457031 45.605469 C 37.010484 46.295216 38.415349 45.910403 39.193359 45.277344 C 39.97137 44.644284 40.277344 43.828125 40.277344 43.828125 L 40.310547 43.742188 L 46.832031 9.7519531 C 46.998903 8.9915162 47.022612 8.334202 46.865234 7.7402344 C 46.707857 7.1462668 46.325492 6.6299361 45.845703 6.34375 C 45.365914 6.0575639 44.864001 5.9649605 44.376953 5.9863281 z M 44.429688 8.0195312 C 44.627491 8.0103707 44.774102 8.032983 44.820312 8.0605469 C 44.866523 8.0881109 44.887272 8.0844829 44.931641 8.2519531 C 44.976011 8.419423 45.000036 8.7721605 44.878906 9.3242188 L 44.875 9.3359375 L 38.390625 43.128906 C 38.375275 43.162926 38.240151 43.475531 37.931641 43.726562 C 37.616914 43.982653 37.266874 44.182554 36.337891 43.792969 L 26.632812 36.224609 L 26.359375 36.009766 L 26.353516 36.015625 L 23.451172 33.837891 L 39.761719 14.648438 A 1.0001 1.0001 0 0 0 38.974609 13 A 1.0001 1.0001 0 0 0 38.445312 13.167969 L 14.84375 28.902344 L 5.9277344 25.849609 C 5.9277344 25.849609 5.0423771 25.356927 5 25.013672 C 4.99765 24.994652 4.9871961 25.011869 5.0332031 24.943359 C 5.0792101 24.874869 5.1948546 24.759225 5.3398438 24.658203 C 5.6298218 24.456159 5.9609375 24.333984 5.9609375 24.333984 L 5.9941406 24.322266 L 6.0273438 24.308594 C 6.0273438 24.308594 15.138894 20.399882 24.410156 16.427734 C 29.045787 14.44166 33.721617 12.440122 37.318359 10.902344 C 40.914175 9.3649615 43.512419 8.2583658 43.732422 8.1699219 C 43.982886 8.0696253 44.231884 8.0286918 44.429688 8.0195312 z M 33.613281 18.792969 L 21.244141 33.345703 L 21.238281 33.351562 A 1.0001 1.0001 0 0 0 21.183594 33.423828 A 1.0001 1.0001 0 0 0 21.128906 33.507812 A 1.0001 1.0001 0 0 0 20.998047 33.892578 A 1.0001 1.0001 0 0 0 20.998047 33.900391 L 19.386719 41.146484 C 19.35993 41.068197 19.341173 41.039555 19.3125 40.947266 L 19.3125 40.945312 C 18.800713 39.30085 16.467362 31.5161 16.144531 30.439453 L 33.613281 18.792969 z M 22.640625 35.730469 L 24.863281 37.398438 L 21.597656 40.425781 L 22.640625 35.730469 z">
                    </path>
                  </svg>
                </div>
              </div>


              <x-input-error :messages="$errors->get('telegram')" class="mt-2" />
            </div>
          </div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
            <div class="w-full xl:w-1/2">

              <div class="relative w-full">

                <input type="text" name="x" value="{{old('x',$SocialMedia->X)}}" placeholder="حساب إكس"
                  class="ps-10 w-full @error('x') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />

                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 30 30">
                    <path
                      d="M26.37,26l-8.795-12.822l0.015,0.012L25.52,4h-2.65l-6.46,7.48L11.28,4H4.33l8.211,11.971L12.54,15.97L3.88,26h2.65 l7.182-8.322L19.42,26H26.37z M10.23,6l12.34,18h-2.1L8.12,6H10.23z">
                    </path>
                  </svg>

                </div>
              </div>
              <x-input-error :messages="$errors->get('x')" class="mt-2" />
            </div>
            <div class="w-full xl:w-1/2">


              <div class="relative w-full">

                <input type="text" name="youtube" value="{{old('youtube',$SocialMedia->YOUTUBE)}}" placeholder="حساب يوتيوب"
                  class="ps-10 w-full @error('youtube') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                      d="M 24.402344 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.402344 16.898438 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.902344 40.5 17.898438 41 24.5 41 C 31.101563 41 37.097656 40.5 40.597656 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.097656 35.5 C 45.5 33 46 29.402344 46.097656 24.902344 C 46.097656 20.402344 45.597656 16.800781 45.097656 14.300781 C 44.699219 12.101563 42.800781 10.5 40.597656 10 C 37.097656 9.5 31 9 24.402344 9 Z M 24.402344 11 C 31.601563 11 37.398438 11.597656 40.199219 12.097656 C 41.699219 12.5 42.898438 13.5 43.097656 14.800781 C 43.699219 18 44.097656 21.402344 44.097656 24.902344 C 44 29.199219 43.5 32.699219 43.097656 35.199219 C 42.800781 37.097656 40.800781 37.699219 40.199219 37.902344 C 36.597656 38.601563 30.597656 39.097656 24.597656 39.097656 C 18.597656 39.097656 12.5 38.699219 9 37.902344 C 7.5 37.5 6.300781 36.5 6.101563 35.199219 C 5.300781 32.398438 5 28.699219 5 25 C 5 20.398438 5.402344 17 5.800781 14.902344 C 6.101563 13 8.199219 12.398438 8.699219 12.199219 C 12 11.5 18.101563 11 24.402344 11 Z M 19 17 L 19 33 L 33 25 Z M 21 20.402344 L 29 25 L 21 29.597656 Z">
                    </path>
                  </svg>
                </div>
              </div>


              <x-input-error :messages="$errors->get('youtube')" class="mt-2" />

            </div>
          </div>
        </div>


        <div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">
            <div class="w-full xl:w-1/2">

              <div class="relative w-full">

                <input type="text" multiple name="facebook" value="{{old('facebook',$SocialMedia->FACEBOOK)}}" placeholder="حساب فيس بوك"
                  class="ps-10 @error('facebook') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />

                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                      d="M 9 4 C 6.2504839 4 4 6.2504839 4 9 L 4 41 C 4 43.749516 6.2504839 46 9 46 L 25.832031 46 A 1.0001 1.0001 0 0 0 26.158203 46 L 31.832031 46 A 1.0001 1.0001 0 0 0 32.158203 46 L 41 46 C 43.749516 46 46 43.749516 46 41 L 46 9 C 46 6.2504839 43.749516 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.668484 6 44 7.3315161 44 9 L 44 41 C 44 42.668484 42.668484 44 41 44 L 33 44 L 33 30 L 36.820312 30 L 38.220703 23 L 33 23 L 33 21 C 33 20.442508 33.05305 20.398929 33.240234 20.277344 C 33.427419 20.155758 34.005822 20 35 20 L 38 20 L 38 14.369141 L 37.429688 14.097656 C 37.429688 14.097656 35.132647 13 32 13 C 29.75 13 27.901588 13.896453 26.71875 15.375 C 25.535912 16.853547 25 18.833333 25 21 L 25 23 L 22 23 L 22 30 L 25 30 L 25 44 L 9 44 C 7.3315161 44 6 42.668484 6 41 L 6 9 C 6 7.3315161 7.3315161 6 9 6 z M 32 15 C 34.079062 15 35.38736 15.458455 36 15.701172 L 36 18 L 35 18 C 33.849178 18 32.926956 18.0952 32.150391 18.599609 C 31.373826 19.104024 31 20.061492 31 21 L 31 25 L 35.779297 25 L 35.179688 28 L 31 28 L 31 44 L 27 44 L 27 28 L 24 28 L 24 25 L 27 25 L 27 21 C 27 19.166667 27.464088 17.646453 28.28125 16.625 C 29.098412 15.603547 30.25 15 32 15 z">
                    </path>
                  </svg>
                </div>
              </div>


              <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
            </div>
            <div class="w-full xl:w-1/2">

              <div class="relative w-full">

                <input type="text" name="snapchat" value="{{old('snapchat',$SocialMedia->SNAPCHAT)}}" placeholder="حساب سناب شات"
                  class="ps-10 w-full @error('snapchat') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />

                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                      d="M 24.5625 3.34375 C 23.578125 3.34375 21.488281 3.496094 19.21875 4.5 C 16.949219 5.503906 14.496094 7.417969 12.96875 10.84375 C 11.816406 13.425781 12.15625 17.183594 12.34375 20.1875 C 12.359375 20.410156 12.363281 20.601563 12.375 20.8125 C 12.28125 20.855469 12.363281 20.875 12.0625 20.875 C 11.609375 20.875 11.003906 20.726563 10.25 20.375 C 9.949219 20.234375 9.628906 20.1875 9.3125 20.1875 C 8.738281 20.1875 8.175781 20.359375 7.6875 20.65625 C 7.199219 20.953125 6.730469 21.414063 6.59375 22.125 C 6.511719 22.5625 6.605469 23.21875 7.03125 23.75 C 7.457031 24.28125 8.117188 24.714844 9.15625 25.125 C 9.382813 25.214844 9.613281 25.300781 9.84375 25.375 C 10.3125 25.523438 10.863281 25.683594 11.28125 25.90625 C 11.699219 26.128906 11.945313 26.390625 12.03125 26.59375 C 12.125 26.8125 12.152344 27.152344 11.84375 27.78125 C 11.832031 27.800781 11.820313 27.824219 11.8125 27.84375 C 11.808594 27.859375 11.792969 27.871094 11.78125 27.90625 C 11.65625 28.1875 8.917969 34.15625 3.21875 35.09375 C 2.484375 35.214844 1.960938 35.855469 2 36.59375 C 2.011719 36.808594 2.082031 37.039063 2.15625 37.21875 C 2.433594 37.871094 3.027344 38.351563 4 38.78125 C 4.898438 39.179688 6.296875 39.53125 8.15625 39.84375 C 8.203125 39.972656 8.265625 40.214844 8.34375 40.5625 C 8.34375 40.570313 8.339844 40.585938 8.34375 40.59375 C 8.414063 40.917969 8.480469 41.273438 8.59375 41.65625 C 8.707031 42.046875 8.996094 42.429688 9.34375 42.625 C 9.691406 42.820313 10.019531 42.84375 10.21875 42.84375 C 10.632813 42.84375 10.976563 42.757813 11.34375 42.6875 C 11.949219 42.570313 12.679688 42.4375 13.625 42.4375 C 14.148438 42.4375 14.695313 42.472656 15.25 42.5625 C 16.199219 42.71875 17.132813 43.335938 18.25 44.125 C 19.867188 45.269531 21.808594 46.65625 24.71875 46.65625 C 24.769531 46.65625 24.824219 46.628906 24.875 46.625 C 24.925781 46.628906 24.980469 46.625 25.03125 46.625 C 25.113281 46.628906 25.199219 46.65625 25.28125 46.65625 C 28.191406 46.65625 30.128906 45.269531 31.75 44.125 C 32.863281 43.335938 33.800781 42.71875 34.75 42.5625 C 35.304688 42.472656 35.851563 42.4375 36.375 42.4375 C 37.289063 42.4375 38.011719 42.554688 38.6875 42.6875 C 39.117188 42.773438 39.445313 42.8125 39.78125 42.8125 L 39.84375 42.8125 C 40.152344 42.8125 40.507813 42.726563 40.8125 42.5 C 41.117188 42.273438 41.320313 41.949219 41.40625 41.65625 C 41.519531 41.273438 41.582031 40.90625 41.65625 40.5625 C 41.738281 40.179688 41.800781 39.972656 41.84375 39.84375 C 43.703125 39.53125 45.101563 39.179688 46 38.78125 C 46.972656 38.351563 47.566406 37.867188 47.84375 37.21875 C 47.925781 37.03125 47.988281 36.808594 48 36.59375 C 48.039063 35.859375 47.511719 35.214844 46.78125 35.09375 C 43.90625 34.621094 41.796875 32.890625 40.375 31.21875 C 38.960938 29.554688 38.257813 27.964844 38.21875 27.875 C 38.21875 27.863281 38.21875 27.855469 38.21875 27.84375 C 38.210938 27.824219 38.199219 27.800781 38.1875 27.78125 C 37.875 27.152344 37.875 26.816406 37.96875 26.59375 C 38.054688 26.390625 38.300781 26.128906 38.71875 25.90625 C 39.136719 25.683594 39.683594 25.523438 40.15625 25.375 C 40.390625 25.300781 40.625 25.210938 40.84375 25.125 C 41.753906 24.765625 42.378906 24.390625 42.8125 23.9375 C 43.246094 23.484375 43.445313 22.921875 43.4375 22.4375 C 43.417969 21.414063 42.65625 20.734375 41.78125 20.40625 L 41.75 20.375 C 41.742188 20.371094 41.726563 20.378906 41.71875 20.375 C 41.359375 20.230469 40.980469 20.15625 40.59375 20.15625 C 40.332031 20.15625 39.96875 20.167969 39.53125 20.375 C 38.851563 20.695313 38.28125 20.851563 37.84375 20.875 C 37.816406 20.875 37.839844 20.875 37.8125 20.875 C 37.785156 20.875 37.804688 20.878906 37.78125 20.875 C 37.652344 20.859375 37.691406 20.835938 37.625 20.8125 C 37.636719 20.640625 37.644531 20.488281 37.65625 20.3125 L 37.65625 20.1875 C 37.847656 17.183594 38.183594 13.429688 37.03125 10.84375 C 35.503906 7.417969 33.054688 5.472656 30.78125 4.46875 C 28.507813 3.464844 26.425781 3.34375 25.4375 3.34375 L 25.34375 3.34375 C 25.332031 3.34375 25.324219 3.34375 25.3125 3.34375 Z M 24.5625 5.34375 L 25.4375 5.34375 C 26.238281 5.34375 28.054688 5.46875 29.96875 6.3125 C 31.882813 7.15625 33.898438 8.691406 35.21875 11.65625 C 35.96875 13.335938 35.847656 17.0625 35.65625 20.0625 L 35.65625 20.1875 C 35.628906 20.605469 35.582031 21.011719 35.5625 21.40625 C 35.554688 21.6875 35.667969 21.960938 35.875 22.15625 C 36.03125 22.316406 36.6875 22.832031 37.78125 22.875 C 37.792969 22.875 37.800781 22.875 37.8125 22.875 C 37.824219 22.875 37.832031 22.875 37.84375 22.875 C 38.652344 22.84375 39.5 22.597656 40.375 22.1875 C 40.398438 22.175781 40.507813 22.15625 40.59375 22.15625 C 40.71875 22.15625 40.882813 22.1875 40.96875 22.21875 C 40.976563 22.222656 40.992188 22.214844 41 22.21875 C 41.019531 22.230469 41.042969 22.242188 41.0625 22.25 C 41.296875 22.332031 41.40625 22.425781 41.4375 22.46875 C 41.445313 22.476563 41.433594 22.496094 41.4375 22.5 C 41.425781 22.519531 41.414063 22.519531 41.375 22.5625 C 41.230469 22.714844 40.832031 22.988281 40.09375 23.28125 C 39.972656 23.328125 39.789063 23.398438 39.5625 23.46875 C 39.089844 23.617188 38.417969 23.820313 37.78125 24.15625 C 37.144531 24.492188 36.472656 24.988281 36.125 25.8125 C 35.753906 26.683594 35.910156 27.640625 36.34375 28.5625 C 36.347656 28.578125 36.339844 28.582031 36.34375 28.59375 C 36.359375 28.636719 36.375 28.660156 36.375 28.65625 C 36.464844 28.863281 37.222656 30.628906 38.84375 32.53125 C 40.300781 34.242188 42.515625 36.011719 45.46875 36.78125 C 45.34375 36.863281 45.429688 36.859375 45.1875 36.96875 C 44.46875 37.285156 43.234375 37.625 41.21875 37.9375 C 40.648438 38.023438 40.222656 38.5625 40.0625 38.9375 C 39.902344 39.3125 39.820313 39.683594 39.71875 40.15625 C 39.671875 40.375 39.613281 40.574219 39.5625 40.78125 C 39.425781 40.769531 39.3125 40.769531 39.0625 40.71875 C 38.335938 40.578125 37.457031 40.4375 36.375 40.4375 C 35.734375 40.4375 35.09375 40.484375 34.4375 40.59375 C 32.902344 40.851563 31.707031 41.710938 30.59375 42.5 C 28.96875 43.644531 27.585938 44.65625 25.28125 44.65625 C 25.1875 44.65625 25.09375 44.660156 25 44.65625 C 24.957031 44.652344 24.917969 44.652344 24.875 44.65625 C 24.835938 44.660156 24.765625 44.65625 24.71875 44.65625 C 22.414063 44.65625 21.023438 43.644531 19.40625 42.5 C 18.289063 41.710938 17.097656 40.847656 15.5625 40.59375 C 14.90625 40.484375 14.265625 40.4375 13.625 40.4375 C 12.472656 40.4375 11.542969 40.601563 10.9375 40.71875 C 10.695313 40.765625 10.605469 40.792969 10.46875 40.8125 C 10.414063 40.59375 10.332031 40.386719 10.28125 40.15625 C 10.1875 39.726563 10.125 39.347656 9.96875 38.96875 C 9.890625 38.78125 9.78125 38.574219 9.59375 38.375 C 9.40625 38.175781 9.128906 38.015625 8.8125 37.96875 C 6.800781 37.65625 5.53125 37.285156 4.8125 36.96875 C 4.5625 36.859375 4.65625 36.867188 4.53125 36.78125 C 10.761719 35.171875 13.472656 29.007813 13.625 28.65625 C 13.636719 28.632813 13.644531 28.617188 13.65625 28.59375 C 13.660156 28.582031 13.652344 28.578125 13.65625 28.5625 C 14.089844 27.640625 14.246094 26.683594 13.875 25.8125 C 13.523438 24.988281 12.855469 24.492188 12.21875 24.15625 C 11.582031 23.820313 10.941406 23.617188 10.46875 23.46875 C 10.238281 23.394531 10.023438 23.328125 9.90625 23.28125 C 9.066406 22.949219 8.699219 22.632813 8.59375 22.5 C 8.59375 22.519531 8.570313 22.433594 8.71875 22.34375 C 8.882813 22.246094 9.171875 22.1875 9.3125 22.1875 C 9.390625 22.1875 9.386719 22.191406 9.375 22.1875 C 10.3125 22.625 11.203125 22.875 12.0625 22.875 C 13.25 22.875 13.960938 22.359375 14.15625 22.15625 C 14.351563 21.957031 14.453125 21.683594 14.4375 21.40625 C 14.414063 20.96875 14.371094 20.523438 14.34375 20.0625 C 14.15625 17.058594 14.03125 13.335938 14.78125 11.65625 C 16.101563 8.695313 18.089844 7.15625 20 6.3125 C 21.910156 5.46875 23.761719 5.34375 24.5625 5.34375 Z">
                    </path>
                  </svg>

                </div>
              </div>
              <x-input-error :messages="$errors->get('snapchat')" class="mt-2" />
            </div>
          </div>
          <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row">

            <div class="w-full xl:w-1/2">


              <div class="relative w-full">

                <input type="text" name="instagram" value="{{old('instagram',$SocialMedia->INSTAGRAM)}}" placeholder="حساب إنستجرام"
                  class="ps-10 w-full @error('instagram') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                      d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z">
                    </path>
                  </svg>

                </div>
              </div>


              <x-input-error :messages="$errors->get('instagram')" class="mt-2" />

            </div>
          </div>
        </div>








      </div>
    </div>
  </div>
</form>