<?php
namespace Raul\Arquitetura\Academico\Dominio;
/**
 * Description of Email
 *
 * @author raul
 */
class Email {
    private string $endereco;
    

    public function __construct(string $endereco) {
        if(filter_var($endereco, FILTER_VALIDATE_EMAIL) === false){
            throw new InvalidArgumentException('email Inválido.');
        }
        
        $this->endereco = $endereco;
    }
    
    public function __toString() {
        return $this->endereco;
    }
}
