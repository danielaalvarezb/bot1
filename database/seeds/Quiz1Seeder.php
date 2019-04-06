<?php

use Illuminate\Database\Seeder;

class Quiz1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
	$quiz = \App\Quiz::create(['titulo' => 'Quiz de Ejemplo']);

	\App\Pregunta::create(['quiz_id' => $quiz->id,
                        	'enunciado' => 'Enunciado #1',
                        	'opcion1' => 'Op1',
                        	'opcion2' => 'Op2',
                        	'opcion3' => 'Op3',
                        	'opcion4' => 'Op4',
                        	'respuesta' => 1]);

	\App\Pregunta::create(['quiz_id' => $quiz->id,
                        	'enunciado' => 'Enunciado #2',
                        	'opcion1' => 'Op1',
                        	'opcion2' => 'Op2',
                        	'opcion3' => 'Op3',
                        	'opcion4' => 'Op4',
                        	'respuesta' => 2]);

	\App\Pregunta::create(['quiz_id' => $quiz->id,
                        	'enunciado' => 'Enunciado #3',
                        	'opcion1' => 'Op1',
                        	'opcion2' => 'Op2',
                        	'opcion3' => 'Op3',
                        	'opcion4' => 'Op4',
                        	'respuesta' => 3]);
}

}
