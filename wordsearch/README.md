# WordSearch
Se debe implementar una función searchWord que recibe una matriz de NxM y una palabra. 

### Ejemplo de matriz

| | | ||
|-|-|-|-|
|a|b|c|d|
|n|k|l|m|
|o|f|z|s|

La función deberá retornar TRUE o FALSE, de acuerdo a las siguiente reglas:
- Una palabra se puede construir de acuerdo a la matriz con letras de una celda secuencialmente adyacente, donde las celdas 'adyacentes' son las vecinas horizontal o verticalmente. Ej. las celdas adyacentes de 'k' son 'b','f','n','l'
- Algunos tips para simplificar la solución:
    - Cuando una letra esta en un borde disminuye la cantidad de celdas adyacentes, por ejemplo 'd' tiene solo a 'c' y 'm' de vecinos, o bien 'b' tiene a 'a','c' y 'k'
    - Las letras de la matriz no se pueden repetir, por ejemplo no puede haber una 'a' en dos posiciones de la matriz.
    
Ejempo del funcionamiento de la función que se debe implementar:

```php
require('WordSearch.php'); // <-- Implementa la función en WordSearch.php

$board = [
    ['a', 'b', 'c', 'd'],
    ['n', 'k', 'l', 'm'],
    ['o', 'f', 'z', 's']
];

searchWord($board, 'abcd'); // true
searchWord($board, 'abcl'); // true
searchWord($board, 'szfkb'); // true

searchWord($board, 'abcz'); // false
searchWord($board, 'dmso'); // false
```
