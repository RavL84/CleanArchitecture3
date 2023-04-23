<?php
namespace Raul\Arquitetura\Academico\Dominio;

/**
 * Description of CPF
 *
 * @author raul
 */
class CPF {
    private string $numero;
    
    public function __construct(string $numero) {
        $this->setNumero($numero);
    }
    
    private function setNumero(string $numero) {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];
        if(filter_var($numero, FILTER_VALIDATE_REGEXP, $options) === false){
            throw new \InvalidArgumentException('CPF Inválido.');
        }
        $this->numero = $numero;
        return $this;
    }
    
    public function __toString() {
        return $this->numero;
    }
}
