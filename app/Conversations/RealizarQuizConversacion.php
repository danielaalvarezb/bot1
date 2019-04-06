<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class RealizarQuizConversacion extends Conversation
{
    protected $idQuiz;
    protected $quiz;
    protected $puntaje;


    public function __construct($idQuiz)
    {
        $this->idQuiz = $idQuiz;
        $this->puntaje = 0;
    }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        if($this->cargarInformacion() == false)
                return;

        $this->iniciar();
    }


    private function cargarInformacion()
    {
        $this->quiz = \App\Quiz::find($this->idQuiz);

        if($this->quiz === null)
        {
                $this->say("Lo siento, el cuestionario solicitado no existe.");
                return false;
        }

        if(count($this->quiz->preguntas) == 0)
        {
                $this->say("Lo siento, el cuestionario aún no tiene preguntas que responder.");
                return false;
        }

        return true;
    }    


    public function iniciar()
    {
        $this->say("Vamos a resolver juntos el cuestionario '".$this->quiz->titulo."'.");

        $consulta = Question::create("¿Estás seguro que deseas continuar?")
        ->addButtons([
                Button::create("Sip, soy valiente")->value('si'),
            Button::create("Nop, me da sustico")->value('no')
        ]);

        $this->ask($consulta, function (Answer $answer)
        {
                $texto = $answer->getText();
            $valor = $answer->getValue();

                switch($valor)
            {
                    case "si":
                        return $this->solucionar(0);
                break;

                    case "no":
                        $this->say("Esta bien, no te preocupes, no haremos nada.");
                        return false;
                break;

                    default:
                        $this->say("Por favor elige una de las opciones: 'si' o 'no'.");
                        $this->repeat();
                break;
                }
        });   	 
    }

    public function solucionar($indice)
    {
        if($indice >= count($this->quiz->preguntas))
        {
            $this->say("La pregunta solicitada no existe: ".$indice);
                return false;
        }

        $pregunta = $this->quiz->preguntas[$indice];

        $consulta = Question::create($pregunta->enunciado)
        ->addButtons([
            Button::create($pregunta->opcion1)->value('1'),
            Button::create($pregunta->opcion2)->value('2'),
            Button::create($pregunta->opcion3)->value('3'),
            Button::create($pregunta->opcion4)->value('4')
            ]);

        $this->ask($consulta, function (Answer $answer) use ($indice, $pregunta)
        {
            if ($answer->isInteractiveMessageReply())
            {
                $texto = $answer->getText();
                $valor = $answer->getValue();

                if($valor === $pregunta->respuesta)
                {
                    $this->say("Correcto!");
                    $this->puntaje = $this->puntaje + 1;
                }
                else
                {
                    $this->say("Incorrecto!");
                }

                $this->siguiente($indice);
            }
            else
            {
                $this->say("Por favor selecciona una de las opciones mostradas.");
                $this->repeat();
            }
        });
    }

    
    private function siguiente($indice)
    {
        $indice = $indice + 1;

        if($indice >= count($this->quiz->preguntas))
                return $this->finalizar();

        return $this->solucionar($indice);
    }

    private function finalizar()
    {
        $maximo = count($this->quiz->preguntas);

        $this->say("Hemos terminado el cuestionario y has obtenido ".
                    $this->puntaje." de ".$maximo." puntos posibles.");
    }

}
