<?php

use Illuminate\Database\Seeder;

class Quiz2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = \App\Quiz::create(['titulo' => 'Programación básica']);
    
        \App\Pregunta::create(['quiz_id' => $quiz->id,
                                'enunciado' => '¿Para qué sirve una variable?',
                                'opcion1' => 'Para gastar un espacio en memoria',
                                'opcion2' => 'Almacena un dato de interés para el programa',
                                'opcion3' => 'Tiene un identificador',
                                'opcion4' => 'Define el rango de valores que puede tener un dato',
                                'respuesta' => 2]);
    
        \App\Pregunta::create(['quiz_id' => $quiz->id,
                                'enunciado' => 'Elija la opción falsa con respecto a los IF',
                                'opcion1' => 'Es posible tener sólo un bloque IF',
                                'opcion2' => 'Es posbile tener un bloque IF con un ELSE',
                                'opcion3' => 'Es posible tener un bloque IF con varios ELSE',
                                'opcion4' => 'Es posible anidar sentencias IF entre sí',
                                'respuesta' => 3]);
    
        \App\Pregunta::create(['quiz_id' => $quiz->id,
                                'enunciado' => '¿Cuál de las siguientes afirmaciones es falsa?',
                                'opcion1' => 'Es posible escribir todo SWITCH como un IF',
                                'opcion2' => 'Es posible escribir todo FOR como un WHILE',
                                'opcion3' => 'Es posible escribir todo IF ternario como una sentencia IF',
                                'opcion4' => 'Es posible escribir todo IF como un SWITCH',
                                'respuesta' => 4]);
    
        \App\Pregunta::create(['quiz_id' => $quiz->id,
                                'enunciado' => '¿Cuál no es una característica propia de los arreglos?',
                                'opcion1' => 'Crecen o se encogen de acuerdo con las necesidades del programa',
                                'opcion2' => 'Todas su celdas son del mismo tipo de datos',
                                'opcion3' => 'Permiten almacenar varios valores',
                                'opcion4' => 'Para acceder a sus celdas se utiliza un índice que inicia en 0',
                                'respuesta' => 1]);
    
        \App\Pregunta::create(['quiz_id' => $quiz->id,
                                'enunciado' => '¿Cuál de las siguientes afirmaciones no es cierta respecto a Java?',
                                'opcion1' => 'Tiene un sistema automático de recolección de basura',
                                'opcion2' => 'Es portable así que sus programas son independientes de plataforma',
                                'opcion3' => 'Genera un ejecutable con código de máquina para la plataforma física',
                                'opcion4' => 'Es un lenguaje mixto ya que soporta objetos pero también tipos simples de datos',
                                'respuesta' => 3]);
    }
    
}
