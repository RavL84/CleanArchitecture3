<?php

namespace Raul\Arquitetura\Shared\Dominio\Evento;

/**
 *
 * @author raul
 * Extendendo a interface JsonSerializable vamos garantir que a interface de 
 * eventos podera ser tratada como um json
 */
interface IEvento extends \JsonSerializable{
    public function momento(): \DateTimeImmutable ;
    
//    public function toArray(): array;
}
