@props([
    'label' => '',
    'name' => '',
    'formats' => 'PNG, JPG, WebP',
    'maxSize' => '5MB',
])

<div class="flex w-full max-w-xl text-center flex-col gap-1">
    <span class="w-fit pl-0.5 text-sm text-neutral-600 dark:text-zinc-200">{{ $label }}</span>
    <div class="flex w-full flex-col items-center justify-center gap-2 rounded-sm border border-dashed border-zinc-300 p-8 text-neutral-600 dark:border-zinc-700 dark:text-zinc-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
             class="w-12 h-12 opacity-75">
            <path fill-rule="evenodd"
                  d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z"
                  clip-rule="evenodd"/>
        </svg>
        <div class="group">
            <label for="{{ $name }}"
                   class="font-medium text-sky-700 group-focus-within:underline dark:text-sky-600">
            </label>
            <input
                id="{{ $name }}"
                type="file"
                {{ $attributes }}
                class="sr-only"
                aria-describedby="{{ $name }}-formats"
            />
            Explorador de archivos
            O arrastra archivos aquí
        </div>
        <small id="{{ $name }}-formats">{{ $formats }} - Max {{ $maxSize }}</small>
    </div>
</div>
