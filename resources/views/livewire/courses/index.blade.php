<div>
    @if (session('success'))
        <x-form.alert label="{{ session('success') }}"/>
    @endif
    <div class="flex justify-end mb-4">
        <a href="{{ route('courses.create') }}" wire:navigate
           class="whitespace-nowrap rounded-sm bg-sky-700 border border-sky-700 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700 active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75 dark:border-sky-600 dark:bg-sky-600 dark:text-white dark:focus-visible:outline-sky-600"
           role="button">Crear</a>
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
                    <td class="p-4">
                        <p class="text-on-surface dark:text-on-surface-dark"><a href="{{route('courses.edit',$course)}}" wire:navigate
                                                                                              class="font-medium text-primary underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2.5" aria-hidden="true" stroke="currentColor" class="size-4 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                </svg>
                            </a>
                        </p>
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
