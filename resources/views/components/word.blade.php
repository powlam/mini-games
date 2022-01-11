@props([
    'word' => '',
    'clues' => []
])

<div class="grid grid-cols-{{ App\Models\SecretWord::LETTERS }} my-4">
    @php
        $word_chars = str_split($word);
    @endphp
    @for ($k = 0; $k < App\Models\SecretWord::LETTERS; $k++)
        @php
            if (($clues ?? false) && array_key_exists($k, $clues)) {
                switch ($clues[$k]) {
                    case App\Models\CheckedWord::CLUE_OK:
                        $clue_classes = 'border-lime-400 bg-lime-200 dark:bg-lime-600';
                        break;
                    case App\Models\CheckedWord::CLUE_FOUND_BUT_NOT_HERE:
                        $clue_classes = 'border-stone-400 bg-amber-200 dark:bg-amber-600';
                        break;
                    case App\Models\CheckedWord::CLUE_NOT_FOUND:
                        $clue_classes = 'border-stone-400 bg-stone-200 dark:bg-stone-600';
                        break;
                }
            }
        @endphp
        <div class="inline-block p-2 mx-1 uppercase border-2 {{ $clue_classes ?? 'border-stone-400 bg-stone-300 dark:bg-stone-500' }}">{!! $word_chars[$k] ?? '&nbsp;' !!}</div>
    @endfor
</div>
