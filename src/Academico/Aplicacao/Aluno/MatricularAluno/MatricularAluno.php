<?php
namespace Raul\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Raul\Arquitetura\Academico\Dominio\Aluno\IRepositorioAluno;
use Raul\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Raul\Arquitetura\Shared\Dominio\Evento\PublicadorDeEventos;
use Raul\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;

/**
 * Description of MatricularAluno
 *
 * @author raul
 */
class MatricularAluno { 

    private IRepositorioAluno $repositorioAluno;
    private PublicadorDeEventos $publicador;

    public function __construct(IRepositorioAluno $repositorioAluno, PublicadorDeEventos $publicador) {
        $this->repositorioAluno = $repositorioAluno;
        $this->publicador = $publicador;
    }

    public function executa(MatricularAlunoDto $dados): void {
        $aluno = Aluno::comCpfEmailNome($dados->getCpf(), $dados->getEmail(), $dados->getNome());
        $this->repositorioAluno->adicionar($aluno);
        
//  ??????????????????????
        $evento = new AlunoMatriculado($aluno->getCpf());
        $this->publicador->publicar($evento);
        
    }

}
