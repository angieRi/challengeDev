<?php
/*
TIP: La funcion getPosInBoard retorna la posición de una letra en el tablero
La podés usar en la implementacion de searchWord. Recorda que una matriz en PHP se accede como $board[$fila][$columna]

Ej.
$board = [
    ['a', 'b', 'c', 'd'],
    ['n', 'k', 'l', 'm'],
    ['o', 'f', 'z', 's']
];

getPosInBoard('l',$board) retornará [1,2] >> O sea, fila 1, columna 2 
*/

function getPosInBoard($letter,$board) {
	for ($i=0; $i < count($board) ; $i++) { 
		for ($j=0; $j < count($board[$i]) ; $j++) { 
			if($letter == $board[$i][$j]) {
				return array($i,$j);
			}
		}
	}
	return NULL;
}

/**
 * @param $board
 * @return bool
 * verifica que los valores en la matriz sean unicos.
 */
function getIsUniqueLetter($board) {
    $isOne= array();

    for ($i=0; $i < count($board) ; $i++) {
        for ($j=0; $j < count($board[$i]) ; $j++) {
                $isOne[] = $board[$i][$j];
        }
    }

    $countBoard=count($isOne);
    return ( count(array_unique($isOne)) == $countBoard ? true :false) ;
}

/**
 * verifica que las palabras sean de letras adyacentes
 * @param $board
 * @param $str
 * @return bool
 */
function searchWord($board, $str)
{
    $isUnique = getIsUniqueLetter($board);

    if ($isUnique) {
        $string = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
        return existLetterAdjacent($board,$string);
    }else{
        return $isUnique;
    }

}

/**
 * @param $board
 * @param $string
 * @return bool
 */
function existLetterAdjacent($board,$string)
{

    $letter = $string[0];
    $wordAux= array();
    $finH = count($board[0]);
    $finv=count($board);

    for ($i=0;$i < count($string); $i++) {

        if($letter == $string[$i]){
            $wordAux[] = $string[$i];

        }

        $letterAux = (( $i +1) != count($string))? $string[$i+1]:"";
        $pos = getPosInBoard($string[$i], $board);

           if($pos[1] == 0 && $pos[0]== 0)//a
           {

               $str1= $board[$pos[0]][$pos[1]+1];
               $str2= $board[$pos[0]+1][$pos[1]];
               if($str1 == $letterAux)
               {
                   $wordAux[]= $str1;
               }elseif ($str2 == $letterAux)
               {
                   $wordAux[]= $str1;
               }
           }

//
            if($pos[1]==0 && $pos[1] < $finH-1 && $pos[0] != 0 && $pos[0] < $finv-1)//n
            {

                    $str1 = $board[$pos[0] + 1][$pos[1]];
                    $str2 = $board[$pos[0] - 1][$pos[1]];
                    $str3 = $board[$pos[0]][$pos[1] + 1];

                if($str1 == $letterAux)
                {
                    $wordAux[]= $str1;
                }elseif ($str2 == $letterAux)
                {
                    $wordAux[]= $str2;
                }elseif ($str3 == $letterAux)
                {
                    $wordAux[]= $str3;
                }


            }
//
            if($pos[1] == 0 && $pos[0] == $finv-1 )//o
            {

                    $str1 = $board[$pos[0] - 1][$pos[1]];
                    $str2 = $board[$pos[0]][$pos[1] + 1];
                if($str1 == $letterAux)
                {
                    $wordAux[]= $str1;
                }elseif ($str2 == $letterAux)
                {
                    $wordAux[]= $str2;
                }

            }

            if($pos[0] == 0 && $pos[1] < $finH-1 && $pos[1] !=0)//b,c
            {

                    $str1 = $board[$pos[0]][$pos[1] + 1];

                    $str2 = $board[$pos[0]][$pos[1] - 1];

                    $str3 = $board[$pos[0] + 1][$pos[1]];

                    if($str1 == $letterAux)
                    {
                        $wordAux[]= $str1;
                    }elseif ($str2 == $letterAux)
                    {
                        $wordAux[]= $str2;
                    }elseif ($str3 == $letterAux)
                    {
                        $wordAux[]= $str3;
                    }

            }

            if($pos[1] == $finH-1 && $pos[0] == 0 ) // d
            {

                    $str1 = $board[$pos[0]][$pos[1] - 1];

                    $str2 = $board[$pos[0] + 1][$pos[1]];


                if($str1 == $letterAux)
                {
                    $wordAux[]= $str1;
                }elseif ($str2 == $letterAux)
                {
                    $wordAux[]= $str2;
                }


            }
           if($pos[1] == $finH-1 && $pos[0] < $finv-1 && $pos[0] != 0)//m
           {

                   $str1 = $board[$pos[0]][$pos[1] - 1];

                   $str2 = $board[$pos[0] + 1][$pos[1]];

                   $str3 = $board[$pos[0] - 1][$pos[1]];

               if($str1 == $letterAux)
               {
                   $wordAux[]= $str1;
               }elseif ($str2 == $letterAux)
               {
                   $wordAux[]= $str2;
               }elseif ($str3 == $letterAux)
               {
                   $wordAux[]= $str3;
               }

           }
             if($pos[1] == $finH-1 && $pos[0] == $finv-1 )//s
               {

                       $str1 = $board[$pos[0]][$pos[1] - 1];

                       $str2 = $board[$pos[0] - 1][$pos[1]];
                       if($str1 == $letterAux)
                       {
                           $wordAux[]= $str1;
                       }elseif ($str2 == $letterAux)
                       {
                           $wordAux[]= $str2;
                       }
                   }
            if($pos[0] == $finv-1 && $pos[1] < $finH-1 && $pos[1] !=0)//z,f
           {

                   $str1 = $board[$pos[0]][$pos[1] + 1];

                   $str2 = $board[$pos[0]][$pos[1] - 1];

                   $str3 = $board[$pos[0] - 1][$pos[1]];

                   if($str1 == $letterAux)
                   {
                       $wordAux[]= $str1;
                   }elseif ($str2 == $letterAux)
                   {
                       $wordAux[]= $str2;
                   }elseif ($str3 == $letterAux)
                   {
                       $wordAux[]= $str3;
                   }

               }
            if($pos[0] < $finv-1 && $pos[0] != 0 && $pos[1] !=0 && $pos[1] < $finH-1)//k,l
           {

                   $str1 = $board[$pos[0]][$pos[1] + 1];

                   $str2 = $board[$pos[0]][$pos[1] - 1];

                   $str3 = $board[$pos[0] + 1][$pos[1]];

                   $str4 = $board[$pos[0] - 1][$pos[1]];


               if($str1 == $letterAux)
               {
                   $wordAux[]= $str1;
               }elseif ($str2 == $letterAux)
               {
                   $wordAux[]= $str2;
               }elseif ($str3 == $letterAux)
               {
                   $wordAux[]= $str3;
               }
               elseif ($str4 == $letterAux)
               {
                   $wordAux[]= $str4;
               }
           }
        }

   return $string ==$wordAux ;

}
