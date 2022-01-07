<?php

namespace Tests\Unit;

use App\Models\CheckedWord;
use PHPUnit\Framework\TestCase;

class CheckedWordTest extends TestCase
{
    public function test_is_equal()
    {
        $tried = new CheckedWord('aaaaa', 'aaAAa');
        $this->assertTrue($tried->isEqual);
    }

    public function test_is_not_equal()
    {
        $tried = new CheckedWord('avaaa', 'aaAAa');
        $this->assertFalse($tried->isEqual);
    }

    public function test_null_is_equal()
    {
        $tried = new CheckedWord(null, null);
        $this->assertTrue($tried->isEqual);
    }

    public function test_null_is_not_equal()
    {
        $tried = new CheckedWord(null, 'aaAAa');
        $this->assertFalse($tried->isEqual);
    }

    public function test_not_equal_has_clues_for_every_character()
    {
        $tried = new CheckedWord('avaaa', 'aaAAa');
        foreach (str_split('avaaa') as $k => $char) {
            $this->assertNotEmpty($tried->clues[$k]);
        }
    }

}
