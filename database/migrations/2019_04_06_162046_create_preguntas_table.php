<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
            Schema::create('preguntas', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('quiz_id');
                
                $table->text('enunciado');
                
                $table->text('opcion1');
                $table->text('opcion2');
                $table->text('opcion3');
                $table->text('opcion4');
        
                $table->enum('respuesta', ['1', '2', '3', '4']);
                $table->timestamps();

    	$table->foreign('quiz_id')
        	->references('id')->on('quizzes')
        	->onUpdate('cascade')
        	->onDelete('cascade');
	});
}

        
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
