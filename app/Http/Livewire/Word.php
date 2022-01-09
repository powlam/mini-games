<?php

namespace App\Http\Livewire;

use App\Models\CheckedWord;
use App\Models\SecretWord;
use Livewire\Component;

class Word extends Component
{
    public $secret;
    public $word;
    public $found = false;
    public $tries = [];
    public $error;

    public function mount()
    {
        $this->secret = SecretWord::get();
    }

    public function render()
    {
        return view('livewire.word');
    }

    public function checkWord()
    {
        $this->resetError();
        if (SecretWord::isValid($this->word)) {
            $tried = new CheckedWord($this->word, $this->secret);
            $this->found = $tried->isEqual;
            $this->tries[] = ['word' => $tried->word, 'clues' => $tried->clues];
            $this->word = '';
        } else {
            $this->error = "'{$this->word}' is not a valid word";
        }
    }

    public function resetError()
    {
        $this->error = '';
    }
}
