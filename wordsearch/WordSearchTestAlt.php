<?php
require('WordSearch.php');

class WordSearchTestAlt 
{
    public function testCeldasAdyacentes()
    {
        $board = [
            ['a', 'b', 'c', 'd'],
            ['n', 'k', 'l', 'm'],
            ['o', 'f', 'z', 's']
        ];

        return searchWord($board, 'abcl') && searchWord($board, 'abklm') && searchWord($board, 'szfkb') && searchWord($board, 'dmszl');
    }

    public function testCeldasNoAdyacentes()
    {
        $board = [
            ['a', 'b', 'c', 'd'],
            ['n', 'k', 'l', 'm'],
            ['o', 'f', 'z', 's']
        ];

        $a = searchWord($board, 'abcz');
        $b = searchWord($board, 'dmso');

        if(is_null($a) || is_null($b)) {
            return true;
        }
        return $a || $b;
    }

    public function testTableroCompleto()
    {
        $board = [
            ['a', 'b', 'c', 'd'],
            ['n', 'k', 'l', 'm'],
            ['o', 'f', 'z', 's']
        ];

        return searchWord($board, 'abcdmlknofzs');
    }
}

$test = new WordSearchTestAlt;
$testCeldasAdyacentes = $test->testCeldasAdyacentes();
$testCeldasNoAdyacentes = $test->testCeldasNoAdyacentes();
$testTableroCompleto = $test->testTableroCompleto();

echo "Ejecutando WordSearchTestAlt\n";
echo "testCeldasAdyacentes: ".( $testCeldasAdyacentes ? "OK" : "ERROR, se esperaba TRUE para los valores 'abcl','abklm','szfkb','dmszl'");
echo "\n";
echo "testCeldasNoAdyacentes: ". ( !$testCeldasNoAdyacentes ? "OK" : "ERROR, se esperaba FALSE para los valores 'abcz','dmso'");
echo "\n";
echo "testTableroCompleto: ". ( $testTableroCompleto ? "OK" : "ERROR, se esperaba TRUE para 'abcdmlknofzs'");
echo "\n";
