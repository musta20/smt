<div x-data="{modalOpen: false}" x-on:modalbox.window="modalOpen=true">
    <div x-cloak x-show="modalOpen"
    x-transition
        class=" fixed left-0 top-0 z-999999 flex h-full min-h-screen w-full items-center justify-center bg-black/90 px-4 py-5">
        <div  {{-- @click.outside="modalOpen = false"  --}} x-transition   class="w-full max-w-142.5 rounded-lg bg-white px-8 py-12 text-center dark:bg-boxdark md:px-17.5 md:py-15">

            {{ $slot }}

        </div>
    </div>
</div>