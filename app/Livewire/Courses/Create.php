<?php

namespace App\Livewire\Courses;

use Livewire\Component;

class Create extends Component
{
    public function store() {
        dump("metodo tienda llamado");
    }
    public function render()
    {
        return view('livewire.courses.create');
    }
}
