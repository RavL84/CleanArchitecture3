<?php
namespace Raul\Arquitetura\Academico\Infra\Aluno;
use Raul\Arquitetura\Dominio\Aluno\ICifradorDeSenha;

/**
 * Description of CifradorDeSenhaPHP
 *
 * @author raul
 */
class CifradorDeSenhaPHP implements ICifradorDeSenha{
    public function cifrar(string $senha): \Raul\Arquitetura\Dominio\Aluno\stirng {
        return password_hash($senha, PASSWORD_ARGON2ID);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool {
        return password_verify($senhaEmTexto, $senhaCifrada);
    }

}
