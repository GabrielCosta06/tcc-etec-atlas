# TCC ETEC Atlas - Enigma com Múltiplas Fases

Este é um programa de enigma desenvolvido para o Trabalho de Conclusão de Curso (TCC) da ETEC, 
que possui múltiplas fases e inclui funcionalidades de login, registro e acompanhamento de progresso do usuário.

## Requisitos

- PHP
- Servidor web local (por exemplo, XAMPP, WAMP, MAMP)
- MySQL (ou outro sistema de gerenciamento de banco de dados relacional)

## Como usar

1. Clone este repositório em seu ambiente local.
2. Configure o servidor web e o banco de dados.
3. Execute o servidor web e inicie o banco de dados.
4. Abra o arquivo PHP correspondente em seu navegador web para executar o programa.

Certifique-se de fornecer as credenciais do banco de dados corretas no arquivo `db_connect.php` para garantir a conexão correta com o banco de dados.

## Estrutura do Arquivo

- `db_connect.php`: Arquivo que contém as credenciais de conexão com o banco de dados.
- `index.php`: Arquivo PHP responsável pela autenticação e redirecionamento do usuário.
- `register.php`: Arquivo PHP para o registro de novos usuários.
- `home-logado.php`: Página principal após o login, mostrando as diferentes fases do enigma.
- `fase1.php`, `fase2.php`, `fase3.php`, `fase4.php`, `fase5.php`: Arquivos PHP responsáveis pela lógica das diferentes fases do enigma.
- Diretório `Login`: Contém os arquivos relacionados à autenticação de login e registro.
- Diretório `Fases`: Contém os arquivos que gerenciam a lógica das diferentes fases do enigma.

## Contribuição

Solicitações pull são bem-vindas. Para grandes mudanças, abra um problema primeiro para discutir o que você gostaria de mudar.

Certifique-se de atualizar os testes conforme apropriado.
