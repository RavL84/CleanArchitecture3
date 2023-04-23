<?php
namespace Raul\Arquitetura\Gamificacao\Dominio\Selo;
use Raul\Arquitetura\Shared\Dominio\CPF;

/**
 *
 * @author raul
 */
interface IRepositorioDeSelo {
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(CPF $cpf);
}
