<?php

namespace Tests\Unit;

use App\Models\SecretWord;
use PHPUnit\Framework\TestCase;

class SecretWordTest extends TestCase
{
    public function test_returns_a_word()
    {
        $word = SecretWord::get();
        $this->assertNotEmpty($word);
    }

    public function test_is_valid_word()
    {
        $this->assertTrue(SecretWord::isValid('altar'));
    }

    public function test_is_not_valid_word()
    {
        $this->assertFalse(SecretWord::isValid('fjkdk'));
    }
}
