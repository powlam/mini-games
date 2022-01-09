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
                        $clue_classes = 'border-green-400 bg-green-200';
                        break;
                    case App\Models\CheckedWord::CLUE_FOUND_BUT_NOT_HERE:
                        $clue_classes = 'border-yellow-400 bg-yellow-200';
                        break;
                    case App\Models\CheckedWord::CLUE_NOT_FOUND:
                        $clue_classes = 'border-gray-400 bg-gray-200';
                        break;
                }
            }
        @endphp
        <div class="inline-block p-2 mx-1 uppercase border-2 {{ $clue_classes ?? 'border-gray-400' }}">{{ $word_chars[$k] ?? '' }}</div>
    @endfor
</div>
