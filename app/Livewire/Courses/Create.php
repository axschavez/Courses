<?php

namespace App\Livewire\Courses;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public CourseForm $form;

    use WithFileUploads;

    public function save(): void
    {
        session()->flash('success', 'Curso creado exitosamente.');

        $this->redirect(route('courses.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.courses.create');
    }
}
