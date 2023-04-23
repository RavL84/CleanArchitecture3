<?php
namespace Raul\Arquitetura\Gamificacao\Aplicacao\BuscarSeloDoUsuario;

use Raul\Arquitetura\Gamificacao\Dominio\Selo\IRepositorioDeSelo;
use Raul\Arquitetura\Shared\Dominio\CPF;

/**
 * Description of CuscarSeloDoUsusario
 *
 * @author raul
 */
class BuscarSeloDoUsusario {
    private IRepositorioDeSelo $repositorioDeSelo;
    
    public function __construct(IRepositorioDeSelo $repositorioDeSelo) {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }
    
    public function execute(BuscarSeloDoUsusarioDto $dados) {
        $cpfAluno = new CPF($dados->getCpfAluno());
        return $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
    }
}
