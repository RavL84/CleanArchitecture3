<?php
namespace Raul\Arquitetura\Academico\Dominio\Aluno;
use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 * Description of AlunoNaoEncontrado
 *
 * @author raul
 */
class AlunoNaoEncontrado extends \DomainException {
    public function __construct(CPF $cpf) {
        parent::__construct("Aluno com CPF $cpf não encontrado.");
    }
}
