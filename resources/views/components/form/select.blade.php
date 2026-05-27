@props([
    'label'=>'',
    'name'=>'',
    'options'=>[],
])
<div class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-zinc-200">
    <label for="{{$name}}" class="w-fit pl-0.5 text-sm">{{$label}}</label>
    <select {{$attributes}} id="{{$name}}" name="{{$name}}" wire:model="{{$name}}"
            class="w-full appearance-none rounded-sm border border-zinc-300 bg-zinc-100 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-zinc-700 dark:bg-zinc-800/50 dark:focus-visible:outline-sky-600">
        @foreach($options as $option => $text)
            <option value="{{ $option }}">{{ $text }}</option>
        @endforeach
    </select>
</div>
