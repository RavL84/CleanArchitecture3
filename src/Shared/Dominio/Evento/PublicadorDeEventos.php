<?php
namespace Raul\Arquitetura\Shared\Dominio\Evento;

use Raul\Arquitetura\Shared\Dominio\Evento\AbstractOuvinteDeEvento;
use Raul\Arquitetura\Shared\Dominio\Evento\IEvento;
/**
 * Description of PublicadorDeEventos
 * Essa classe é reponsável por publicar qualquer evento detectado pelo Ouvinte de eventos.
 * Os ouvintes são armazenados em um array[] e através do método publicar() percorremos
 *   o array[] e usamos o método processar() que está na classe extendida. 
 *
 * @author raul
 */
class PublicadorDeEventos {
    private array $ouvintes = [];
    
    public function adicionarOuvinte(AbstractOuvinteDeEvento $ouvinte): void {
        $this->ouvintes[] = $ouvinte;
    }
    
    public function publicar(IEvento $evento) {
        
        /**@var OuvinteDeEvento  $ouvinte*/
        foreach ($this->ouvintes as $ouvinte) {
            $ouvinte->processa($evento);
        }
    }
    
}
