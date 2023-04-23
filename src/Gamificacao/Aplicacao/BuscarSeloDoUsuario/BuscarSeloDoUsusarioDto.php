<?php
namespace Raul\Arquitetura\Gamificacao\Aplicacao\BuscarSeloDoUsuario;
use Raul\Arquitetura\Shared\Dominio\CPF;
/**
 * Description of CuscarSeloDoUsusario
 *
 * @author raul
 */
class BuscarSeloDoUsusarioDto {
    private string $cpfAluno;
    
    public function __construct(string $cpfAluno) {
        $this->cpfAluno = $cpfAluno;
    }
    
    public function getCpfAluno(): string {
        return $this->cpfAluno;
    }
}
