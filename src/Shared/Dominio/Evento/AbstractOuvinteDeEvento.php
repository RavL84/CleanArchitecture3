<?php
namespace Raul\Arquitetura\Shared\Dominio\Evento;

use Raul\Arquitetura\Shared\Dominio\Evento\IEvento;
/**
 * Description of OuvinteDeEvento
 *
 * @author raul
 */
abstract class AbstractOuvinteDeEvento {

    public function processa(IEvento $evento): void {
        if ($this->sabeProcessar($evento)) {
            $this->reageAo($evento);
        }
    }

    abstract public function sabeProcessar(IEvento $evento): bool;
    abstract public function reageAo(IEvento $evento): void;
}
