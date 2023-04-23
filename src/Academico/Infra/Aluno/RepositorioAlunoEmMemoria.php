<?php
namespace Raul\Arquitetura\Academico\Infra\Aluno;

use Raul\Arquitetura\Academico\Dominio\Aluno\IRepositorioAluno;
use Raul\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Raul\Arquitetura\Shared\Dominio\CPF;
use Raul\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontrado;

/**
 * Description of RepositorioAlunoEmMemoria
 *
 * @author raul
 */
class RepositorioAlunoEmMemoria implements IRepositorioAluno{
    private array $alunos = [];
    
    public function adicionar(Aluno $aluno): void {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(CPF $cpf): Aluno {
        $alunosFiltrados = array_filter($this->alunos, fn(Aluno $aluno) => $aluno->getCpf() == $cpf);
       
//        if(count($alunosFiltrados === 0)){
//            throw  new AlunoNaoEncontrado($cpf);
//        }
//        
//         if(count($alunosFiltrados > 1)){
//            throw  new Exception();
//        }
        
        return $alunosFiltrados[0];
    }

    public function buscarTodos(): array {
        return $this->alunos;
    }

}
