<div>
    @foreach ($tries as $try)
        <x-word :word="$try['word']" :clues="$try['clues']"/>
    @endforeach

    <x-word :word="$word"/>

    <input type="text" wire:model="word" wire:keydown.enter="checkWord" wire:keydown.escape="resetError" autofocus onblur="this.focus()" maxlength="{{ App\Models\SecretWord::LETTERS }}" class="appearance-none border-0 outline-0 font-mono tracking-widest uppercase text-center bg-stone-100 text-stone-400 dark:bg-stone-600 dark:text-stone-400">

    @if ($error)
        <div class="p-2 m-2 bg-red-200 text-sm text-red-600 rounded border-2 border-red-400 cursor-pointer" wire:click="resetError">
            {{ $error }}
        </div>
    @endif

    @if ($found)
        <div class="p-2 m-2 bg-lime-200 text-sm text-lime-600 rounded border-2 border-lime-400">
            @lang('secret-word.well-done', ['secret' => $secret])
        </div>
    @endif
</div>
