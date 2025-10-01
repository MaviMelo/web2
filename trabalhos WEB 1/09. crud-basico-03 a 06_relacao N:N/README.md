# Atividade 7 – CRUD com Relacionamento N--N: Médico, Paciente e Consultas

Professor: Alexandre Strapação Guedes Vianna
•4 de jul.

Aluno: Maviael Melo.

100 pontos
Objetivo: Desenvolver um sistema web completo que implemente um CRUD (Criar, Ler, Atualizar e Deletar) para três entidades: Médico, Paciente e Consulta, modelando corretamente um relacionamento N para N entre Médicos e Pacientes, através da tabela intermediária Consultas.

## Descrição do Sistema
Você deve criar três tabelas no banco de dados:

Médico:  id (chave primária), nome, especialidade
-	Paciente: id (chave primária), nome, data_nascimento, tipo_sanguineo
-	Consulta: (tabela intermediária para o relacionamento N-N): id_medico (chave estrangeira para Médico), id_paciente (chave estrangeira para Paciente), data_hora (tipo timestamp), observações (texto)
-	Chave primária composta: (id_medico, id_paciente, data_hora)

### Requisitos da Atividade
1.	Criar as três tabelas no banco de dados com seus relacionamentos.
2.	Implementar o CRUD completo de todas as entidades.
3.	Funcionalidade para registrar uma consulta
4.	A interface pode ser feita, inicialmente, com HTML puro. (Após o funcionamento completo, a estilização com CSS é bem-vinda.)

### Opcional – Integração com Login
Você poderá, opcionalmente, incluir um sistema simples de login e controle de acesso. Essa funcionalidade será obrigatória na próxima atividade, então quem quiser se adiantar já pode integrá-la agora.

### Entrega
Enviar o link do repositório Git com o projeto ou um arquivo .zip contendo todos os arquivos.
Incluir obrigatoriamente o script SQL de criação das tabelas no banco de dados.

# Atividade 8 – Incorporar login ao sistema de Médico, Paciente e Consultas

Professor: Alexandre Strapação Guedes Vianna
•25 de jul.

Aluno: Maviael Melo.

100 pontos
Objetivo: Incorpore o sistema de login apresentado em sala de aula ao sistema da clinica médica.
O usuário deverá estar logado para realizar as operações de cadastro, edição e deleção.
Verifique o código do exemplo de sala de aula: https://github.com/AlexandreSGV/curso_web_1

# Atividade 9 - Imagem de perfil para o paciente da clínica médica
Alexandre Strapação Guedes Vianna
•25 de jul.

Aluno: Maviael Melo.

100 pontos
Objetivo: Inclua o anexo de uma imagem de perfil para o paciente da clínica médica.

Se inspire no exemplo de sala de aula crud_basico_06: https://github.com/AlexandreSGV/curso_web_1

Documentação oficial do PHP:
https://www.php.net/manual/pt_BR/

Executar PHP online
https://php-play.dev/

Repositório com exemplo de PHP:
https://github.com/AlexandreSGV/curso_web_1
