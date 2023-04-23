<?php
namespace Raul\Arquitetura\Academico\Infra\Aluno;
use Raul\Arquitetura\Dominio\Aluno\ICifradorDeSenha;
/**
 * Description of CifradorDeSenhaMD5
 *
 * @author raul
 */
class CifradorDeSenhaMD5 implements ICifradorDeSenha{
    public function cifrar(string $senha): \Raul\Arquitetura\Dominio\Aluno\stirng {
        return md5($senha);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool {
        return md5($senhaEmTexto) === $senhaCifrada;
    }

}
