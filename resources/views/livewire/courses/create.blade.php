<div>
    <form wire:submit="save" enctype="multipart/form-data"
          class="space-y-4 max-w-2xl p-4 bg-surface-alt dark:bg-surface-dark-alt rounded-lg shadow-md">

        <x-form.text wire:model="form.title" label="Título" name="form.title" placeholder="Ingrese el título."/>
        <x-form.textarea wire:model="form.description" label="Descripción" name="form.description" placeholder="Ingrese la descripción."/>
        <x-form.select wire:model="form.level" label="Nivel" name="form.level" wire:model="form.level"
            :options="[
            'beginner' => 'Principiante',
            'intermediate' => 'Intermedio',
            'advanced' => 'Avanzado',
        ]"/>
        <x-form.text wire:model="form.price" label="Precio" name="form.price" type="number"/>
        {{--        <x-form.file wire:model="form.thumbnail" label="Miniatura" name="form.thumbnail" />--}}

        <div class="flex w-full max-w-xl text-center flex-col gap-1">
            <label class="block text-sm font-medium mb-2">Miniatura (Prueba Directa)</label>
            <input
                type="file"
                wire:model="form.thumbnail"
                name="form.thumbnail"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90"
            />
            @error('thumbnail') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <x-form.submit />
    </form>
</div>

