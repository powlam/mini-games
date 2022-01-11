<div>
    @foreach ($tries as $try)
        <x-word :word="$try['word']" :clues="$try['clues']"/>
    @endforeach

    <x-word :word="$word"/>

    <input type="text" wire:model="word" wire:keydown.enter="checkWord" wire:keydown.escape="resetError" autofocus onblur="this.focus()" maxlength="{{ App\Models\SecretWord::LETTERS }}" class="appearance-none border-0 outline-0 uppercase text-center text-blue-300">

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
