<?php

namespace App\Http\Livewire;

use App\Models\CheckedWord;
use Livewire\Component;

class Word extends Component
{
    public $secret;
    public $word;
    public $found = false;
    public $tries = [];

    public function render()
    {
        return view('livewire.word');
    }

    public function checkWord()
    {
        $tried = new CheckedWord($this->word, $this->secret);
        $this->found = $tried->isEqual;
        if (!$this->found) {
            $this->tries[] = ['word' => $tried->word, 'clues' => $tried->clues];
        }
    }
}
