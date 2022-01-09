<div>
    @foreach ($tries as $try)
        <x-word :word="$try['word']" :clues="$try['clues']"/>
    @endforeach

    <x-word :word="$word"/>

    <input type="text" wire:model="word" autofocus maxlength="{{ App\Models\SecretWord::LETTERS }}" class="uppercase">
    <button wire:click="checkWord" class="bg-yellow-200 hover:bg-yellow-400 p-2 cursor-pointer block">
        Check
    </button>
    @if ($error)
        <div class="text-lg p-2 m-2 text-red-400 rounded border-2 border-red-400 cursor-pointer" wire:click="resetError">
            {{ $error }}
        </div>
    @endif

    @if ($found)
        <div class="text-lg p-2 m-2 text-green-400 rounded border-2 border-green-400">
            WELL DONE! "{{ $secret }}" was the secret word
        </div>
    @endif
</div>
