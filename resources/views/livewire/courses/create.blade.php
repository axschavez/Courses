<div>
    <form wire:submit="store"
          class="space-y-4 max-w-2xl p-4 bg-surface-alt dark:bg-surface-dark-alt rounded-lg shadow-md">

        <x-form.text label="Título" name="title" placeholder="Ingrese el título."/>
        <x-form.textarea label="Descripción" name="description" placeholder="Ingrese la descripción."/>
        <x-form.select label="Nivel" name="level" wire:model="level"
            :options="[
            'beginner' => 'Principiante',
            'intermediate' => 'Intermedio',
            'advanced' => 'Avanzado',
        ]"/>
        <x-form.file label="Miniatura" name="thumbnail" />

        <x-form.submit />
    </form>
</div>

