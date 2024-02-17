<div x-data="{ uploading: false,fileLoded:false, progress: 0  }"
    class="flex flex-col items-center m-5  bg-slate-200 border-2 border-bodydark1  ">
    <div x-ref="dnd" class="relative flex w-4/6  flex-col items-center justify-center h-30 m-10 border-2 border-dashed  hover:border-primary hover:border-3 bg-slate-50 rounded-lg 
                 bg-gray-50 hover:bg-gray-100 ">
        <input multiple wire:model='photo' id="dropzone-file" type="file"
            class="absolute h-full w-full opacity-0 cursor-pointer" for="dropzone-file"
            x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false;fileLoded=true"
            x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
            @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
            @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');" />

        <div x-show="!uploading" class="  flex flex-col items-center justify-center ">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">
                    اضغط هنا لرفع الملفات</span> او اسحب هنا</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>



        <div x-show="uploading" class="w-1/2 bg-gray-200 rounded-full text-lg mb-1 font-medium h-3 dark:bg-gray-700">
            <div class="bg-blue-600  rounded-full text-white text-center transition-width" x-text="progress+'%'"
                x-bind:style="progress && { width : progress+'%' }"></div>
        </div>

    </div>

    
    <div class=" grid xl:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 gap-2  p-2 w-full min-h-14">

        @if ($files)
        @foreach ($files as $item =>$type)
        <div x-data="{showCancle:false}">
            <div width="150" height="150" @mouseenter="showCancle=true" @mouseleave="showCancle=false"
                class=" rounded-lg relative  ">
                <img :class="{'blur-sm' : showCancle==true}" class=" rounded-lg   " src="{{ tenant_asset('media/'.$item) }}"
                    {{-- src="{{$item->temporaryUrl()}}" --}} />
                <button wire:click="remove('{{$item}}')" x-show="showCancle"
                    class="absolute bg-white hover:bg-slate-200 rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">

                    <svg class="w-10 h-10 text-gray-900 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 18 6m0 12L6 6" />
                    </svg>
                </button>
            </div>
        </div>

        @endforeach
        @endif
    </div>


</div>