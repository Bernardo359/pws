<?php
require_once 'Pokemon.php';

/**
 * TAREFA 4 - CLASSE ARENA (FORNECIDA)
 * Responsável por gerir a interação entre os objetos e a lógica de combate.
 */
class Arena {
    private Pokemon $p1;
    private Pokemon $p2;

    public function __construct(Pokemon $p1, Pokemon $p2) {
        $this->p1 = $p1;
        $this->p2 = $p2;
    }

    public function getP1(): Pokemon { return $this->p1; }
    public function getP2(): Pokemon { return $this->p2; }

    /**
     * Lógica de turnos (para o interface funcionar)
     */
    public function executarTurno(): array {
        $logs = [];
        
        // Se ambos estiverem vivos, o P1 ataca o P2
        if ($this->p1->getHp() > 0 && $this->p2->getHp() > 0) {
            $logs[] = $this->p1->atacar($this->p2);
        }
        
        // Se P2 sobreviveu, contra-ataca
        if ($this->p2->getHp() > 0 && $this->p1->getHp() > 0) {
            $logs[] = $this->p2->atacar($this->p1);
        }

        return $logs;
    }
}
