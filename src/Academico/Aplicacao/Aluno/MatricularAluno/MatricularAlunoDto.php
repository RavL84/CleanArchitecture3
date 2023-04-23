<?php
namespace Raul\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 * Description of MatricularAlunoDto
 *
 * @author raul
 */
class MatricularAlunoDto {
    private string $cpfAluno;
    private string $nomeAluno;
    private string $emailAluno;
    
    public function __construct(string $cpf, string $nome, string $email) {
        $this->cpfAluno = $cpf;
        $this->nomeAluno = $nome;
        $this->emailAluno= $email;
    }
    
    public function getCpf(): string {
        return $this->cpfAluno;
    }
    
        public function getNome(): string {
        return $this->nomeAluno;
    }
    
        public function getEmail(): string {
        return $this->emailAluno;
    }
}
