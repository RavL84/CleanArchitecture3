<?php

namespace Raul\Arquitetura\Academico\Infra\Aluno;

use Raul\Arquitetura\Dominio\Aluno\IRepositorioAluno;
use Raul\Arquitetura\Dominio\Aluno\Aluno;
use Raul\Arquitetura\Shared\Dominio\CPF;
use Raul\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;

/**
 * Description of RepositorioAlunoPDO
 *
 * @author raul
 */
class RepositorioAlunoPDO implements IRepositorioAluno {

    private \PDO $conexao;

    public function __construct(\PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function adicionar(Aluno $aluno): void {

        $sql = "INSERT INTO alunos VALUES (:cpf , :nome, :email)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf', $aluno->getCpf());
        $stmt->bindValue('nome', $aluno->getNome());
        $stmt->bindValue('cpf', $aluno->getEmail());
        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf_aluno', $aluno->getCpf());

        /*         * @var Telefone $telefones */
        foreach ($aluno->getTelefones() as $telefone) {
            $stmt->bindValue('ddd', $telefone->getDDD());
            $stmt->bindValue('numero', $telefone->getNumero());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(CPF $cpf): Aluno {
        $sql = "SELECT cpf, nome, email, ddd, numero AS numero_telefone 
        FROM alunos
        LEFT JOIN telelfones ON telelfones.cpf_aluno = alunos.cpf
        WHERE alunos.cpf = ?;";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();
        
        $dadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(count($dadosAlunos) === 0){
            throw new AlunoNaoEncontrado();
        }
        
        return $this->mapearAluno($dadosAlunos);
    }
    
    public function mapearAluno(array $dadosAlunos) {
        $primeiraLinha = $dadosAlunos[0];
        $aluno = Aluno::comCpfEmailNome($primeiraLinha['cpf'], $primeiraLinha['email'], $primeiraLinha['nome']);
        $telefones = array_filter($dadosAlunos, fn ($linha) => $linha['ddd'] !== null && $linha['numero'] !== null );
        foreach ($telefones as $telefone){
            $aluno->addNumero($linha['ddd'], $linha['numero']);
        }
        
        return $aluno;
    }

    public function buscarTodos(): array {
        $sql = "SELECT cpf, nome, email, ddd, numero AS numero_telefone 
        FROM alunos
        LEFT JOIN telelfones ON telelfones.cpf_aluno = alunos.cpf";
        
        $stmt = $this->conexao->query($sql);
        
        $listaDadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $alunos = [];
        
        foreach ($listaDadosAlunos as $dadosAlunos){
            if(!array_key_exists($dadosAlunos['cpf'], $alunos)){
                $alunos[$dadosAlunos['cpf']] = Aluno::comCpfEmailNome(
                        $dadosAlunos['cpf'], 
                        $dadosAlunos['email'], 
                        $dadosAlunos['nome']);
            }
//            ??????????????????????????
            $alunos[$dadosAlunos['cpf']]->addNumero($dadosAlunos['ddd'], $dadosAlunos['numero']);
        }
        return array_values($alunos);
    }
}
