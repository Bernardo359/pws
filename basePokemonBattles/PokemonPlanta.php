<?php
require_once 'Pokemon.php';
require_once 'PokemonFogo.php';
require_once 'PokemonAgua.php';

/**
 * TAREFA 2 - ESPECIALIZAÇÃO
 * Estender a classe Pokemon e definir o poder de ataque base: 30.
 */
class PokemonPlanta extends Pokemon {
    // TODO: Implementar Construtor invocando parent::__construct
    public function __construct($nome, $hp)
    {
        parent::__construct($nome, $hp, 30);
    }

    /**
     * TAREFA 3 - REGRAS DE NEGÓCIO (POLIMORFISMO)
     * Implementar lógica de ataque específica:
     * - Se atacar PokemonAgua: Dano = $poderAtaqueBase x 2
     */
    public function atacar(Pokemon $alvo) {
        // Implementar lógica e retornar string do log
        $dano = $this->poderAtaqueBase;

        if($alvo instanceof PokemonAgua){
            $dano = $dano * 2;
            $tipo = "Agua";
        } elseif($alvo instanceof PokemonFogo){
            $tipo = "Fogo";
        } else $tipo = "Planta";

        $alvo->receberDano($dano);

        return $this->nome . " atacou " . "(" . $tipo . ")" . $alvo->getName() . " e causou " . $dano . " de dano.";
    }
}
