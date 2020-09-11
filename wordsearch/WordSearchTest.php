<?php
require('WordSearch.php');

class WordSearchTest extends PHPUnit\Framework\TestCase
{
    public function testCeldasAdyacentes()
    {
        $board = [
            ['a', 'b', 'c', 'd'],
            ['n', 'k', 'l', 'm'],
            ['o', 'f', 'z', 's']
        ];

        $this->assertTrue(searchWord($board, 'abcl'));
        $this->assertTrue(searchWord($board, 'abklm'));
        $this->assertTrue(searchWord($board, 'szfkb'));
        $this->assertTrue(searchWord($board, 'dmszl'));
    }

    public function testCeldasNoAdyacentes()
    {
        $board = [
            ['a', 'b', 'c', 'd'],
            ['n', 'k', 'l', 'm'],
            ['o', 'f', 'z', 's']
        ];

        $this->assertFalse(searchWord($board, 'abcz'));
        $this->assertFalse(searchWord($board, 'dmso'));
    }

    public function testTableroCompleto()
    {
        $board = [
            ['a', 'b', 'c', 'd'],
            ['n', 'k', 'l', 'm'],
            ['o', 'f', 'z', 's']
        ];

        $this->assertTrue(searchWord($board, 'abcdmlknofzs'));
    }
}