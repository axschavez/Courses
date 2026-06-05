<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function deleteCourse(Course $course)
    {
        $course->delete();

        session()->flash('success', 'Course successfully deleted');
        $this->redirectRoute('courses.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.courses.index', ['courses' => Course::latest()->paginate(10)]);
    }
}
