<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileManger extends Component
{

    use WithFileUploads;

    public $files = [];
    public  $fileDragging =  null;
    public   $fileDropping = null;

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
        return view('livewire.admin.file-manger');
    }
}
