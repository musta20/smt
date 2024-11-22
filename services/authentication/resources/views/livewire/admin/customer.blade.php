<div>
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
        <h3 class="mt-1 p-2 text-xl font-bold text-black dark:text-white sm:text-2xl">
          <strong class="text-3xl"> {{ __('messages.Are you sure') }}</strong>
        </h3>
        <p class="m-5 text-2xl">{{ __('messages.you want to delete user :') }}
          {{ $user->name ?? "" }}
        </p>


        <form method="post" action="{{ route('admin.customer.destroy',$user->id ?? "") }}"
          class="-mx-3 flex flex-wrap gap-y-4">
          @csrf
          @method('delete')

          <div class="w-full px-3 2xsm:w-1/2">
            <button type="submit"
              class="block w-full rounded border border-meta-1 bg-meta-1 p-3 text-center font-medium text-white transition hover:bg-opacity-90">
              {{ __('messages.Delete') }}
            </button>
          </div>


          <div class="w-full px-3 2xsm:w-1/2">
            <button @click.prevent="modalOpen = false"
              class="block w-full rounded border border-stroke bg-gray p-3 text-center font-medium text-black transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:bg-meta-4 dark:text-white dark:hover:border-meta-1 dark:hover:bg-meta-1">
              {{ __('messages.Cancel') }}
            </button>
          </div>

        </form>
      </x-modal>
      <div class="flex gap-9 justify-center md:flex-row flex-col">

        <div x-data class="w-3/4 gap-9">
          <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div
              class="grid grid-cols-10 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
              <div class="col-span-4 flex items-center">
                <p class="font-medium"> {{ __('messages.Users') }}</p>
              </div>

            </div>

            @foreach ($users as $item)
            <div
              class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
              <div class="col-span-4 flex items-center">

                <p class="text-sm font-medium text-black dark:text-white">
                  <span class="hover:text-primary">

                    {{ $item->name }}

                  </span>
                </p>
              </div>
              <div class="col-span-3 hidden items-center sm:flex">
              </div>
              <div class="col-span-1 flex items-center group relative inline-block">
                <button wire:click="openModel('{{ $item->id }}')" class="text-red-500 hover:text-red-950">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>

                </button>
                <div
                  class="shadow absolute left-full top-1/2 z-20 ml-3 -translate-y-1/2 whitespace-nowrap rounded-md bg-white px-4.5 py-1.5 text-sm font-medium opacity-0  group-hover:opacity-100 dark:bg-meta-4">
                  <span
                    class="absolute -left-1 top-1/2 -z-10 h-2 w-2 -translate-y-1/2 rotate-45 rounded-r-sm bg-white dark:bg-meta-4"></span>
                    {{ __('messages.Cancel') }}
                </div>
              </div>


            </div>

            @endforeach

          </div>
        </div>




      </div>

    </div>
  </div>