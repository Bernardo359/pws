<?php
require_once 'Pokemon.php';
require_once 'PokemonPlanta.php';
require_once 'PokemonAgua.php';

/**
 * TAREFA 2 - ESPECIALIZAÇÃO
 * Estender a classe Pokemon e definir o poder de ataque base: 25.
 */
class PokemonFogo extends Pokemon {
    // TODO: Implementar Construtor invocando parent::__construct
    public function __construct($nome, $hp)
    {
        parent::__construct($nome, $hp, 25);
    }

    /**
     * TAREFA 3 - REGRAS DE NEGÓCIO (POLIMORFISMO)
     * Implementar lógica de ataque específica:
     * - Se atacar PokemonPlanta: Dano = $poderAtaqueBase x 2
     * - Caso contrário: Dano = $poderAtaqueBase
     */
    public function atacar(Pokemon $alvo) {
        // Implementar lógica e retornar string do log
        $dano = $this->poderAtaqueBase;

        if($alvo instanceof PokemonPlanta){
            $dano = $dano * 2;
            $tipo = "Planta";
        } else if($alvo instanceof PokemonAgua){
            $tipo = "Agua";
        } else $tipo = "Fogo";

        $alvo->receberDano($dano);

        return $this->nome . " atacou " . "(" . $tipo . ")" . $alvo->getName() . " e causou " . $dano . " de dano.";
    }
}
