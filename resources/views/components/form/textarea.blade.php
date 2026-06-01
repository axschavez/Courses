@props([
    'label'=>'',
    'name'=>''
])
<div class="flex w-full max-w-md flex-col gap-1 text-neutral-600 dark:text-zinc-200">
    <label for="{{$name}}" class="w-fit pl-0.5 text-sm">{{$label}}</label>
    <textarea {{$attributes}} id="{{$name}}"
              class="w-full rounded-sm border border-zinc-300 bg-zinc-100 px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-zinc-700 dark:bg-zinc-800/50 dark:focus-visible:outline-sky-600"
              rows="3"></textarea>
    @error($name)
    <small class="pl-0.5 text-danger">{{ $message }}</small>
    @enderror
</div>
