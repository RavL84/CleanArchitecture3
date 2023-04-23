<?php
namespace Raul\Arquitetura\Academico\Dominio\Aluno;

use Raul\Arquitetura\Shared\Dominio\CPF;
use Raul\Arquitetura\Academico\Dominio\Email;

/**
 * Description of Aluno
 *
 * @author raul
 */
class Aluno {
    private CPF $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;
    
//  Named constructors
    public static function comCpfEmailNome(string $numeroCpf, string $email, string $nome): self {
        return new Aluno(new CPF($numeroCpf), $nome, new Email($email));
    }
    
    public function __construct(CPF $cpf, string $nome, Email $email) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefones = [];
    }
    
//  Invariança relação entre duas classes.
    public function addNumero(string $ddd, string $numero): self {
        if(count($this->telefones) > 2){
            throw new \DomainException('Aluno já possui dois números de telefones.');
        }
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }
    
    public function  getCpf(): CPF {
        return $this->cpf;
    }
    
    public function getNome(): string {
        return $this->nome;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function getTelefones(): array {
        $this->telefones;
    }
}

//Aluno::comCpfEmailNome($numeroCpf, $email, $nome)
//        ->addNumero($ddd, $numero)
//        ->addNumero($ddd, $numero);
