<?php
namespace Raul\Arquitetura\Academico\Dominio\Aluno;

use Raul\Arquitetura\Shared\Dominio\Evento\IEvento;
use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 * Description of AlunoMatriculado
 * Essa classe se comporta como um evento, ela grava o momento que algo aontece e
 *  nesse caso obedece ao contrato de IEvento.
 * No construtor optamos por receber um objeto CPF em vez de um Aluno pois ao receber
 *  um Aluno dariamos mais poder do o necessario a essa classe.
 * 
 * @author raul
 */
class AlunoMatriculado implements IEvento{
    private \DateTimeImmutable $momento;
    private CPF $cpfAluno;
    public function __construct(CPF $cpfAluno) {
        $this->momento = new \DateTimeImmutable();
        $this->cpfAluno = $cpfAluno;
    }
    public function getCpfAluno(): CPF {
        return $this->cpfAluno;
    }
    public function momento(): \DateTimeImmutable {
        return $this->momento;
    }

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }

//    public function toArray(): array {
//        
//    }

}
