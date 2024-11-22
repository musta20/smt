<x-main-layout :page="__('messages.About')">

    <section style="height: 20rem"
        class=" m-2   text-pretty  bg-white m-2 py-5 px-3 rounded-lg   ">
        <!-- image galary indecater -->
        <h3 class="p-3 ">{{ __('messages.About us') }}</h3>
        <hr >
        <p class="w-3/4 p-3 text-balance text-base">
            {{ $store->about }}
        </p>

    </section>



</x-main-layout>