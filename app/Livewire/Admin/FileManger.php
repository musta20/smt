<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class FileManger extends Component
{

    use WithFileUploads;
     //#[Validate('image|max:1024')] // 1MB Max

    public $photo ;
    public $form;
    public $files = [
        'productImage/0Vy1Lc7vrn4fcKLgUg5PgfSfGCtJfmlXjqM9JF08.jpg',
        'productImage/1lFnYjpqAzL0TeMcORiiUQTsF3GczgAaTuDFeYge.jpg',
        'productImage/2pBmLMXEe5hn5wF0aRQFzi78fobFHv0Tyunr2JaS.jpg ',
        'productImage/4gyRCfJp213QNrbA9WPwQAlv5vgHjB9Lw3Sr8GZe.png ',
        'productImage/2SgxXbKylgsfahE3x3P3aDbhDJez52WmvG3UWuGC.jpg',
        'productImage/0Vy1Lc7vrn4fcKLgUg5PgfSfGCtJfmlXjqM9JF08.jpg',
        'productImage/1lFnYjpqAzL0TeMcORiiUQTsF3GczgAaTuDFeYge.jpg',
        'productImage/2pBmLMXEe5hn5wF0aRQFzi78fobFHv0Tyunr2JaS.jpg ',
        'productImage/4gyRCfJp213QNrbA9WPwQAlv5vgHjB9Lw3Sr8GZe.png ',
        'productImage/2SgxXbKylgsfahE3x3P3aDbhDJez52WmvG3UWuGC.jpg',
    ];
    public  $fileDragging =  null;
    public   $fileDropping = null;
    
    public function save()
    {

        //dd($this->photo);
        // dd(Storage::get($path));
        //  Storage::disk('local')->put('example.txt', 'Contents');
       // dd($this->photo->getMimeType);
      //  dd($this->photo->temporaryUrl());
        //$this->photo->storePublicly(path: 'photos');
        // dd($this->photos);
        // foreach ($this->photos as $photo) {
        //     $photo->store(path: 'photos');
        // }
    }

   public function updatedPhoto()
{
   // dd($this->photo);
    foreach ($this->photo as $imge) {
       $this->files[] = $imge->store(path: 'productImage');
    } 

   // dd($this->photo);

  //  dd($this->photo);
   // here you can store immediately on any change of the property
}
    public function humanFileSize($size)
    {
        //  $i = Math.floor(Math.log(size) / Math.log(1024));

        // return (
        //     (size / Math.pow(1024, i)).toFixed(2) * 1 +
        //     " " +
        //     ["B", "kB", "MB", "GB", "TB"][i]
        // );
    }
    public function  remove($index)
    {
        // let files = [...this.files];
        // files.splice(index, 1);

        // this.files = createFileListMin(files);
    }
    public function drop($e)
    {
        // let removed, add;
        // let files = [...this.files];

        // removed = files.splice(this.fileDragging, 1);
        // files.splice(this.fileDropping, 0, ...removed);

        // this.files = createFileListMin(files);

        // this.fileDropping = null;
        // this.fileDragging = null;
    }
    public function   dragenter($e)
    {
        // let targetElem = e.target.closest("[draggable]");

        // this.fileDropping = targetElem.getAttribute("data-index");
    }
    public function  dragstart($e)
    {
        // this.fileDragging = e.target
        //     .closest("[draggable]")
        //     .getAttribute("data-index");
        // e.dataTransfer.effectAllowed = "move";
    }
    public function loadFile($file)
    {
        // const preview = document.querySelectorAll(".preview");
        // const blobUrl = URL.createObjectURL(file);

        // preview.forEach(elem => {
        //     elem.onload = () => {
        //         URL.revokeObjectURL(elem.src); // free memory
        //     };
        // });

        // return blobUrl;
    }
    public function   addFiles($e)
    {
        // const files = createFileListMin([...this.files], [...e.target.files]);
        // this.files = files;
        // this.form.formData.files = [...files];
    }




    public function render()
    {
      // dd(storage_path());
        return view('livewire.admin.file-manger');
    }
}
