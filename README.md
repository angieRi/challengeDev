# Developer Challenge

- account [Ver enunciado](account/)
- wordsearch [Ver enunciado](wordsearch/)

En cada carpeta del repositorio podrás ver el README.me de cada ejercicio en donde se encuentra su enunciado.

Para ejecutar los test, podes usar los phpunit que ya estan en el repositorio (phpunit-5.7.phar para php5.6/php5.7 y phpunit.phar php7 en adelante) dependiendo la versión de php que tengas instalada. Por ejemplo:
```
./phpunit-5.7.phar account/AccountTest.php
./phpunit-5.7.phar wordsearch/WordSearchTest.php
```
o
```
./phpunit.phar account/AccountTest.php
./phpunit.phar wordsearch/WordSearchTest.php
```
si existen problemas con PHPUnit correr los test alternativos
```
php account/AccountTestAlt.php
php wordsearch/WordSearchTestAlt.php
```
