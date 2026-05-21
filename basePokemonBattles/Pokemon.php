<?php
/**
 * TAREFA 1 - MODELAÇÃO DA ENTIDADE BASE
 * Implemente esta classe seguindo os requisitos do enunciado:
 * - Atributos protected ($nome, $hp, $poderAtaqueBase)
 * - Construtor e Getters
 * - Método receberDano($dano) com validação de HP
 * - Método abstrato atacar(Pokemon $alvo)
 */
abstract class Pokemon {
    // TODO: Declarar atributos protegidos
    protected String $nome; 
    protected int $hp;
    protected int $poderAtaqueBase;

    // TODO: Implementar Construtor
    public function __construct($nome, $hp, $poderAtaqueBase)
    {
        $this->nome = $nome;
        $this->hp = $hp;
        $this->poderAtaqueBase = $poderAtaqueBase;
    }

    // TODO: Implementar Getters

    public function getName(){
        return $this->nome;
    }

    public function getHp(){
        return $this->hp;
    }

    public function getPoderAtaqueBase(){
        return $this->poderAtaqueBase;
    }

    /**
     * TODO: Implementar método receberDano
     * Regra: HP nunca pode ser inferior a 0.
     */
    public function receberDano(int $dano) {
        // Implementar lógica aqui
        $this->hp -= $dano;

        if($this->hp < 0){
            $this->hp = 0;
        }
    }

    /**
     * TODO: Declarar a assinatura do método abstrato atacar
     */
    abstract public function atacar(Pokemon $alvo);
}
