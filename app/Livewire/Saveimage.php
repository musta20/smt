<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Saveimage extends Component
{

    use WithFileUploads;
    //#[Validate('image|max:1024')] // 1MB Max

    public $photo;
    public $files = [
        // 'productImage/0Vy1Lc7vrn4fcKLgUg5PgfSfGCtJfmlXjqM9JF08.jpg',
        // 'productImage/1lFnYjpqAzL0TeMcORiiUQTsF3GczgAaTuDFeYge.jpg',
        // 'productImage/2pBmLMXEe5hn5wF0aRQFzi78fobFHv0Tyunr2JaS.jpg ',
        // 'productImage/4gyRCfJp213QNrbA9WPwQAlv5vgHjB9Lw3Sr8GZe.png ',
        // 'productImage/2SgxXbKylgsfahE3x3P3aDbhDJez52WmvG3UWuGC.jpg',
        // 'productImage/0Vy1Lc7vrn4fcKLgUg5PgfSfGCtJfmlXjqM9JF08.jpg',
        // 'productImage/1lFnYjpqAzL0TeMcORiiUQTsF3GczgAaTuDFeYge.jpg',
        // 'productImage/2pBmLMXEe5hn5wF0aRQFzi78fobFHv0Tyunr2JaS.jpg ',
        // 'productImage/4gyRCfJp213QNrbA9WPwQAlv5vgHjB9Lw3Sr8GZe.png ',
        // 'productImage/2SgxXbKylgsfahE3x3P3aDbhDJez52WmvG3UWuGC.jpg',
    ];

    public function updatedPhoto()
    {

        $this->photo->store('/');
        // dd($this->photo);
        // foreach ($this->photo as $imge) {
        // dd($imge);

        //     //Storage::put('/', $imge);


        //  //   $this->files[] = Storage::disk('public');//$imge->storeAs('/', rand(1654654,654654).'img', 'images');
        // }
    }
    public function humanFileSize($size)
    {
    }

    public function  remove($index)
    {
    }



    public function render()
    {
        
        //Storage::delete('productImage/0Vy1Lc7vrn4fcKLgUg5PgfSfGCtJfmlXjqM9JF08.jpg');

        return view('livewire.saveimage');
    }
}
