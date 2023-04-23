<?php

namespace Raul\Arquitetura\Academico\Dominio\Aluno;

/**
 *
 * @author raul
 */
interface ICifradorDeSenha {
    public function cifrar(string $senha): stirng;
    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool;
    
}
