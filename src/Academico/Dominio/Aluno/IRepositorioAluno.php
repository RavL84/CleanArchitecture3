<?php
namespace Raul\Arquitetura\Academico\Dominio\Aluno;
use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 *
 * @author raul
 */
interface IRepositorioAluno {
    public function adicionar(Aluno $aluno): void;
    public function buscarPorCpf(CPF $cpf): Aluno;
    /** @return Aluno[]*/
    public function buscarTodos(): array;
}
