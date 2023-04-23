<?php
namespace Raul\Arquitetura\Academico\Aplicacao\Indicacao;
/**
 * Description of EnviaEmailIndicacao
 *
 * @author raul
 */
interface IEnviaEmailIndicacao {
    public function enviaPara(Aluno $alunoIndicado): void;
    
}
