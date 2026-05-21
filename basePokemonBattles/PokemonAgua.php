<?php
require_once 'Pokemon.php';
require_once 'PokemonFogo.php';
require_once 'PokemonPlanta.php';

/**
 * TAREFA 2 - ESPECIALIZAÇÃO
 * Estender a classe Pokemon e definir o poder de ataque base: 20.
 */
class PokemonAgua extends Pokemon {
    // TODO: Implementar Construtor invocando parent::__construct
    public function __construct($nome, $hp){
        parent::__construct($nome, $hp, 20); //Poder de ataque base 20
    }

    /**
     * TAREFA 3 - REGRAS DE NEGÓCIO (POLIMORFISMO)
     * Implementar lógica de ataque específica:
     * - Se atacar PokemonFogo: Dano = $poderAtaqueBase x 2
     */
    public function atacar(Pokemon $alvo) {
        // Implementar lógica e retornar string do log
        $dano = $this->poderAtaqueBase;

        if($alvo instanceof PokemonFogo){
            $dano = $dano * 2;
            $tipo = "Fogo";
        } else if($alvo instanceof PokemonAgua){
            $tipo = "Agua";
        } else $tipo = "Planta";
        

        $alvo->receberDano($dano);

        return $this->nome . " atacou " . "(" . $tipo . ")" . $alvo->getName() . " e causou " . $dano . " de dano.";
    }
}
