<div class="h-full w-full flex flex-col">
    <div class="w-full h-auto flex-1 flex items-center justify-center">
        <div class="relative">
            {{-- {!! $output !!} --}}
            {{-- @component('x-ui.button') --}}
            <x-dynamic-component :component="$componentLocation" :attributes="new Illuminate\View\ComponentAttributeBag($attributeArray)">hello</x-dynamic-component>

            <input wire:model.live="size" type="text" />
            <button wire:click="update">Update</button>
            {{-- @endcomponent --}}
        </div>
    </div>
    <div class="w-full h-[200px] bg-white overflow-scroll border-t border-zinc-300">
        {!! ($options ?? '') !!}
    </div>
</div>
