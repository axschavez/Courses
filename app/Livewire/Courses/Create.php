<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $description = '';
    public float $price = 0;
    public string $level = 'beginner';
    public $thumbnail;

    protected array $rules = [
        'title'       => ['required', 'string', 'max:255'],
        'description' => ['required'],
        'price'       => ['required', 'numeric', 'min:0'],
        'level'       => ['required', 'in:beginner,intermediate,advanced'],
        'thumbnail'   => ['nullable', 'image', 'max:5120'], // 5MB
    ];
    public function updatedThumbnail()
    {
        $this->validateOnly('thumbnail');
    }
    public function store(): void
    {
        $this->validate();
        /*dd([
            'thumbnail_received' => $this->thumbnail !== null,
            'thumbnail_name' => $this->thumbnail?->getClientOriginalName(),
            'thumbnail_size' => $this->thumbnail?->getSize(),
        ]);*/
        //tenemos que ver como solucionar el problema que no guarda imagenes
        $thumbnailPath = null;

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');
        }

        Course::create([
            'title'       => $this->title,
            'slug'        => Str::slug($this->title) . '-' . time(),
            'description' => $this->description,
            'price'       => $this->price,
            'level'       => $this->level,
            'status'      => 'draft',
            'user_id'     => auth()->id(),
            'thumbnail'   => $thumbnailPath,
        ]);

        session()->flash('success', 'Curso creado exitosamente.');

        $this->redirect(route('courses.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.courses.create');
    }
}
