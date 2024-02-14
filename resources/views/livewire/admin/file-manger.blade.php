<div class=" w-full">

    <div>


        <div x-data="{ uploading: false,fileLoded:false, progress: 0  }" class="flex flex-col items-center m-5  bg-slate-200 border-2 border-bodydark1  ">
            <label for="dropzone-file" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false;fileLoded=true"
                x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                class="flex w-1/2  flex-col items-center justify-center h-30 m-10 border-2 border-dashed  hover:border-primary hover:border-3 bg-slate-50 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 ">
                <div x-show="!uploading" class=" w-1/2 flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
          
                
               
                  <div 
                  x-show="uploading"
                   class="w-1/2 bg-gray-200 rounded-full text-lg mb-1 font-medium h-3 dark:bg-gray-700">
                    <div 
                    class="bg-blue-600  rounded-full text-white text-center transition-width" 
                    x-text="progress+'%'" 
                    x-bind:style="progress && { width : progress+'%' }"></div>
                  </div>


                <input multiple wire:model='photo' id="dropzone-file" type="file" class="hidden" />
            </label>



            <div x-show="!uploading" class=" grid xl:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 gap-2  m-5 p-5 w-full ">
                @if ($files)
                @foreach ($files as $item)
                <div x-data="{showCancle:false}">
                    <div width="150" height="150"  @mouseenter="showCancle=true" @mouseleave="showCancle=false" class=" rounded-lg relative  ">
                        <img class=" rounded-lg  " src="{{ asset('storage/'.$item) }}" />
                        <div x-show="showCancle"
                            class="absolute bg-white  rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">

                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </div>
                    </div>
                </div>

                @endforeach
                @endif
            </div>


        </div>






























        {{-- <div class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
            <div
                class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                <input wire:model="photo" id="photo" accept="*" type="file"
                    class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                    @change="$refs.formFile.submit()"
                    @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                    @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                    @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');" />

                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="m-0">Drag your files here or click in this area.</p>
                </div>


            </div>



            <template x-if="files.length > 0">
                <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                    @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                    <template x-for="(_, index) in Array.from({ length: files.length })">
                        <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                            style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
                            :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">
                            <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                type="button" @click="remove(index)">
                                <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <template x-if="files[index].type.includes('audio/')">
                                <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                </svg>
                            </template>
                            <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                                <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </template>
                            <template x-if="files[index].type.includes('image/')">
                                <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                    x-bind:src="loadFile(files[index])" />
                            </template>
                            <template x-if="files[index].type.includes('video/')">
                                <video
                                    class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                    <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                </video>
                            </template>

                            <div
                                class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                <span class="w-full font-bold text-gray-900 truncate"
                                    x-text="files[index].name">Loading</span>
                                <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
                            </div>

                            <div class="absolute inset-0 z-40 transition-colors duration-300"
                                @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div> --}}




    </div>