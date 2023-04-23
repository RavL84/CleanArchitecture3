<?php
namespace Raul\Arquitetura\Gamificacao\Aplicacao\Evento;

use Raul\Arquitetura\Shared\Dominio\Evento\IEvento;
use Raul\Arquitetura\Shared\Dominio\Evento\AbstractOuvinteDeEvento;
use Raul\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Raul\Arquitetura\Gamificacao\Dominio\Selo\IRepositorioDeSelo;
//use Raul\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;

/**
 * Description of GeraSeloDeNovato
 *
 * @author raul
 */
class GeraSeloDeNovato extends AbstractOuvinteDeEvento{
    private IRepositorioDeSelo $repositorioDeSelo;
    
    public function __construct(IRepositorioDeSelo $repositorioDeSelo ) {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }
    
    public function reageAo(IEvento $evento): void {
        $evento->getCpfAluno();
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];
       
        $selo = new Selo($cpf, 'Novato');
        $this->repositorioDeSelo->adiciona($selo);
    }

    public function sabeProcessar(IEvento $evento): bool {
//        return $evento instanceof AlunoMatriculado; 
         return get_class($evento) === 'Raul\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
    }

}
