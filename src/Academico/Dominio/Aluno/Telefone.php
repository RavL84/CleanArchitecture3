<?php
namespace Raul\Arquitetura\Academico\Dominio\Aluno;

/**
 * Description of Telefone
 *
 * @author raul
 */
class Telefone {
    private string $ddd;
    private string $numero;
    public function __construct(string $ddd, string $numero) {
        $this->setDDD($ddd);
        $this->setNumero($numero);
    }
    
    private function setDDD(string $ddd) {
        if(preg_match('/\d{2}/', $ddd) !== 1){
            throw new InvalidArgumentException('DDD Inválido.');
        }
        $this->ddd = $ddd;
    }
    
     private function setNumero(string $numero) {
        if(preg_match('/\d{8,9}/', $numero) !== 1){
            throw new InvalidArgumentException('Número de telefone inválido.');
        }
        $this->numero = $numero;
    }
    
     public function getDDD(): string  {
        return $this->ddd;
    }
    
    public function getNumero(): string  {
        return $this->numero;
    }
    
    public function __toString() {
        return "{$this->ddd} {$this->numero}";
    }
}
