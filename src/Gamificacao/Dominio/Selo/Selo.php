<?php
namespace Raul\Arquitetura\Gamificacao\Dominio\Selo;
use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 * Description of Selo
 *
 * @author raul
 */
class Selo {
    private CPF $cpfAluno;
    private string $nome;
    
    public function __construct(CPF $cpfAluno, string $nome) {
        $this->cpfAluno = $cpfAluno;
        $this->nome = $nome;
    }
    
    public function getCpfAluno(): CPF {
        return $this->cpfAluno;
    }
    
    public function __toString() {
        return $this->nome;
    }
}
