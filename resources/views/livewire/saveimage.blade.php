<div class=" ">


    <input  wire:model='photo' id="dropzone-file" type="file"
        class="" />


        @if ($photo) 
        <img src="{{ $photo->temporaryUrl() }}">
    @endif

</div>