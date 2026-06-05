<?php

namespace App\Livewire\Courses;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use Livewire\Component;

class Update extends Component
{
    public CourseForm $form;

    public function mount(Course $course)
    {
        $this->form->setCourse($course);
    }

    public function save()
    {
        $this->form->update();
        session()->flash('message', 'Course successfully updated.');
        $this->redirectRoute('courses.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.courses.create');
    }
}
