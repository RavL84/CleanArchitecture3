/**
 * Author:  raul
 * Created: 20 de mar. de 2023
 */
CREATE TABLE alunos (
    cpf VARCHAR(32) PRIMARY KEY,
    nome VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL
);

CREATE TABLE telelfones (
    ddd VARCHAR(32),
    numero VARCHAR(32),
    cpf_aluno VARCHAR(32),
    PRIMARY KEY (ddd, numero),
    FOREIGN KEY (cpf_aluno) REFERENCES alunos(cpf)
);

CREATE TABLE indicacoes (
    cpf_indicante VARCHAR(32),
    cpf_indicado VARCHAR(32),
    data_indicacao VARCHAR(32),
    PRIMARY KEY(cpf_indicante, cpf_indicado),
    FOREIGN KEY(cpf_indicante) REFERENCES alunos(cpf),
    FOREIGN KEY(cpf_indicado) REFERENCES alunos(cpf)
);
INSERT INTO alunos VALUES ('192.168.181-56', 'Raul', 'raul@raul.com');
INSERT INTO telelfones VALUES ('61', '99659-8745', '192.168.181-56');

SELECT cpf, nome, email, ddd, numero AS numero_telefone 
FROM alunos
LEFT JOIN telelfones ON telelfones.cpf_aluno = alunos.cpf
WHERE alunos.cpf = ?;