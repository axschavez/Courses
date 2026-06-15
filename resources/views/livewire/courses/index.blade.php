<div>
    @if (session('success'))
        <x-form.alert label="{{ session('success') }}"/>
    @endif

        <div class="flex flex-col md:flex-row gap-6">
            <x-form.search wire:model.live.debounce.100ms="search"/>
            <x-form.btncreate href="{{ route('courses.create') }}" wire:navigate/>
        </div>
        <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
        <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
            <thead
                class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">Titulo</th>
                <th scope="col" class="p-4">Descripcion</th>
                <th scope="col" class="p-4">Precio</th>
                <th scope="col" class="p-4">Nivel</th>
                <th scope="col" class="p-4">Estado</th>
                <th scope="col" class="p-4">Acciones</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @forelse($courses as $course)
                <tr>
                    <td class="p-4">{{$course->title}}</td>
                    <td class="p-4">{{$course->description}}</td>
                    <td class="p-4">{{$course->price}}</td>
                    <td class="p-4">{{$course->level}}</td>
                    <td class="p-4">{{$course->status}}</td>
                    <td class="p-4 flex items-center gap-2">
                        <x-form.btnedit href="{{route('courses.edit',$course)}}" wire:navigate />
                        <x-form.btndelete wire:click="deleteCourse({{$course}})" wire:confirm="are you sure?"/>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">Sin registros</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $courses->links() }}
        </div>
    </div>
</div>
