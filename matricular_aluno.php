 <?php
require './vendor/autoload.php';
require_once './src/Academico/Aplicacao/Aluno/MatricularAluno/MatricularAluno.php';

use Raul\Arquitetura\Shared\Dominio\Evento\PublicadorDeEventos;
use Raul\Arquitetura\Academico\Infra\Aluno\RepositorioAlunoEmMemoria;
use Raul\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Raul\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Raul\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Raul\Arquitetura\Gamificacao\Aplicacao\Evento\GeraSeloDeNovato;
use Raul\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

//$aluno = Aluno::comCpfEmailNome($cpf, $nome, $email)->addNumero($ddd, $numero);        
//$repositorio = new RepositorioAlunoEmMemoria();
//$repositorio->adicionar($aluno);

$publicador = new PublicadorDeEventos();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
$publicador->adicionarOuvinte(new GeraSeloDeNovato(new RepositorioDeSeloEmMemoria()));

$useCase = new MatricularAluno(new RepositorioAlunoEmMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));

//=====================================================================================


// php matricular_aluno.php "123.456.789-10" "Raul Alencar" "raul@raul.com" "61" "9999-9999" 

