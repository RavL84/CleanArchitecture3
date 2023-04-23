<?php
namespace Raul\Arquitetura\Gamificacao\Infra\Selo;

use Raul\Arquitetura\Gamificacao\Dominio\Selo\IRepositorioDeSelo;
use Raul\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 * Description of RepositorioDeSeloEmMemoria
 *
 * @author raul
 */
class RepositorioDeSeloEmMemoria implements IRepositorioDeSelo{
    private array $selos = [];
    
    public function adiciona(Selo $selo): void {
        $this->selos[] = $selo; 
    }

    public function selosDeAlunoComCpf(CPF $cpf) {
        return array_filter($this->selos, fn (Selo $selo) => $selo->getCpfAluno() == $cpf);
    }

}
