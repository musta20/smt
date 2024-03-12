@props([ 'comment'])
<div class="mb-1 py-3 ">
  <div class="py-1 mb-2 border-b-2 flex  w-1/2 gap-3 justify-between ">
   <strong>{{$comment->user->name}}</strong>
   <x-user-rating :rating="$comment->rating" /> 
      <hr>

</div> 
   <p>
    {{$comment->comment}}
   </p>
</div>