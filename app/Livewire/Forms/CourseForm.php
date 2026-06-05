<?php

namespace App\Livewire\Forms;

use App\Models\Course;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CourseForm extends Form
{
    public ?Course $course;

    #[Validate(['required', 'string', 'max:255'])]
    public $title;

    #[Validate(['required', 'string'])]
    public $description;

    #[Validate(['required', 'numeric', 'min:0'])]
    public $price;

    #[Validate(['required', 'in:beginner,intermediate,advanced'])]
    public $level = 'beginner';

    #[Validate(['nullable', 'image', 'max:5120'])]
    public $thumbnail;

    public function setCourse(Course $course)
    {
        $this->course = $course;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->price = $course->price;
        $this->level = $course->level;
    }

    public function store()
    {
        $this->validate();
        $thumbnailPath = null;

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');
        }

        Course::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title).'-'.time(),
            'description' => $this->description,
            'price' => $this->price,
            'level' => $this->level,
            'status' => 'draft',
            'user_id' => auth()->id(),
            'thumbnail' => $thumbnailPath,
        ]);
    }

    public function update()
    {
        $this->validate();
        $this->course->update($this->all());
    }

    public function updatedThumbnail()
    {
        $this->validateOnly('thumbnail');
    }
}
