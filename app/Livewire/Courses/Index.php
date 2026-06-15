<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function deleteCourse(Course $course)
    {
        $course->delete();

        session()->flash('success', 'Course successfully deleted');
        $this->redirectRoute('courses.index', navigate: true);
    }

    public function render()
    {
        $search = $this->search;

        $courses = Course::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhere('level', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.courses.index', compact('courses'));
    }
}
