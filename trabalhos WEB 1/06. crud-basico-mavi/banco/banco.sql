/*
CREATE DATABASE sistema_ifpe;

USE sistema_ifpe;


CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    matricula VARCHAR(50) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL
);
*/



-- tabela PRODUTOS do mercado_DB

/*
Field:      Type:             null:      key:        Default:         Extra: 
ID          int               NOT        PRIMARY     NULL             auto_increment 
nome        VARCHAR(225)      NOT                    NULL
cod_barra   varchar(13)       not                    null
lote        int               not                    null
validade    date              not                    NULL
preço       decimal(6,2)      not                    NULL
quantidade  int               not                    null 
data_estoq  timestamp         yes                    current_timestampdefault_generated 


 */


CREATE DATABASE mercado_db; 

USE mercado_db

CREATE TABLE produto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  preco DECIMAL(6,2) NOT NULL,
  cod_barra VARCHAR(13) NOT NULL, 
  lote INT NOT NULL,
  validade DATE NOT NULL,
  quantidade INT NOT NULL,
  data_estoque TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
)
