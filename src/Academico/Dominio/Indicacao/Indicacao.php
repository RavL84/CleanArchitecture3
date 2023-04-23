<?php
namespace Raul\Arquitetura\Academico\Dominio\Indicacao;

use Raul\Arquitetura\Aluno\Aluno;

/**
 * Description of Indicacao
 *
 * @author raul
 */
class Indicacao {
    private Aluno $indicante;
    private Aluno $indicado;
    private \DateTimeImmutable $data;
    
    public function __construct(Aluno $indicante, Aluno $indicado) {
        $this->indicante = $indicante;
        $this->indicado = $this->indicado;
        
        $this->data = new \DateTimeImmutable();
        
    }
}
