<?php

namespace App\Models;

use Illuminate\Support\Str;

class CheckedWord
{
    const CLUE_OK = 1;
    const CLUE_FOUND_BUT_NOT_HERE = 2;
    const CLUE_NOT_FOUND = 3;

    public $word, $secret, $isEqual = false, $clues = [];

    /**
     * @param string $word
     * @param string $secret
     */
    public function __construct($word, $secret)
    {
        $this->word = Str::upper($word);
        $this->secret = Str::upper($secret);
        $this->isEqual = $this->check();
    }

    /**
     * @return bool Checks if the words are equal (case-insensitive). It also sets the $clues
     */
    private function check()
    {
        $equal = $this->word === $this->secret;
        $word_chars = str_split($this->word);
        $this->clues = [];
        if ($equal) {
            foreach (array_keys($word_chars) as $k) {
                $this->clues[$k] = self::CLUE_OK;
            }
        } else {
            $secret_chars = str_split($this->secret);
            foreach (array_keys($word_chars) as $k) {
                $this->clues[$k] = $this->clueForChar($k, $word_chars, $secret_chars);
            }
        }
        return $equal;
    }

    /**
     * @param int $k
     * @param string[] $word_chars
     * @param string[] $secret_chars
     * @return int a clue (parametrized)
     */
    private function clueForChar($k, $word_chars, $secret_chars)
    {
        if (array_key_exists($k, $secret_chars) && $word_chars[$k] === $secret_chars[$k]) {
            return self::CLUE_OK;
        }
        if (in_array($word_chars[$k], $secret_chars, true)) {
            return self::CLUE_FOUND_BUT_NOT_HERE;
        } else {
            return self::CLUE_NOT_FOUND;
        }
    }
}
