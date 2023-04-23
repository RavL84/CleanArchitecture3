<?php
namespace Raul\Arquitetura\Academico\Dominio\Aluno;

use Raul\Arquitetura\Shared\Dominio\Evento\AbstractOuvinteDeEvento;
use Raul\Arquitetura\Shared\Dominio\Evento\IEvento;

/**
 * Description of LogDeAlunoMatriculado
 * Ouvinte de um evento de matrícula, evento que matricula alunos.
 *  
 * 
 * @author raul
 */
class LogDeAlunoMatriculado extends AbstractOuvinteDeEvento {

//    public function ouviteEvento(AlunoMatriculado $alunoMatriculado) {
//        
//    }

    /*     * @param AlunoMatriculado $alunoMatriculado */
    public function reageAo(IEvento $alunoMatriculado): void {
        fprintf(
                STDERR,
                'Aluno com CPF %s foi matriculado na data %s',
                (string) $alunoMatriculado->getCpfAluno(),
                $alunoMatriculado->momento()->format('d/m/Y')) . PHP_EOL;
    }

    public function sabeProcessar(IEvento $evento): bool {
        return $evento instanceof AlunoMatriculado;
    }

}
