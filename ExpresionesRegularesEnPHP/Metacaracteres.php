<?php

/*El símbolo caret ^ y el de dólar $ son metacaracteres. El poder de las expresiones regulares viene dado por la capacidad de incluir alternativas y repeticiones en el patrón. Éstas están codificadas en el patrón por el uso de metacaracteres, que no tienen una representación en el string, sino que modifican la interpretación del patrón.
 * 
 * Se pueden dividir en dos: los que se interpretan fuera de los corchetes y los que se interpretan dentro:
 * 
 * Metacaracteres fuera de los corchetes:
 * Metacarácter    Descripción
 * \               escape
 * ^               inicio de string o línea
 * $               final de string o línea
 * .               coincide con cualquier carácter excepto nueva línea
 * [               inicio de la definición de clase carácter
 * ]               fin de la definición de clase carácter
 * |               inicio de la rama alternativa
 * (               inicio de subpatrón
 * )               fin de subpatrón
 * ?               amplía el significado del subpatrón, cuantificador 0 ó 1, y hace lazy los cuantificadores greedy
 * *               cuantificador 0 o más
 * +               cuantificador 1 o más
 * {               inicio de cuantificador mín/máx
 * }               fin de cuantificador mín/máx
 * 
 * Metacaracteres dentro de los corchetes:
 * Metacarácter    Descripción
 * \               carácter de escape general
 * ^               niega la clase, pero sólo si es el primer carácter
 * -               indica el rango de caracteres
 * 
 * Si queremos escapar cualquiera de los metacaracteres anteriores tan sólo hay que utilizar el backslash \:
 */

// Ejemplo de una multiplicación con el metacarácter *
$string = '3*4';
echo preg_match('/^3\*4/', $string); // Devuelve 1

/*Debido a las interpretaciones especiales del entrecomillado en PHP, si se quiere comparar \ mediante la expresión regular \, se ha de usar "\\" ó '\\'.*/

