<x-main-layout>

    <section style="height: 50rem"
        class=" m-2   text-pretty  bg-white m-2 py-5 px-3 rounded-lg  border ">
        <!-- image galary indecater -->
        <h3 class="p-3 "> من نحن</h3>
        <hr >
        <p class="w-3/4 p-3 text-balance">
            {{$store->about}}
        </p>

    </section>



</x-main-layout>