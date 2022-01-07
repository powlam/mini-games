<div>
    @foreach ($tries as $try)
        <p>{{ $try['word'] }} {{ implode('-', $try['clues']) }}</p>
    @endforeach

    <input type="text" wire:model="word">
    <button wire:click="checkWord">Check</button>

    @if ($found)
        <div>WELL DONE! "{{ $secret }}" was the secret word</div>
    @endif
</div>
