# CakeBlog :cake:

Realização do tutorial Blog utilizando o framework CakePHP

#### Para testar o projeto, é necessário:

- Ter o WampServer ou o XamppServer (Foi o utilizado para o estudo)

- (No XamppServer) Copiar os arquivos do projeto para a pasta "C:\xampp\htdocs", ou para o diretório onde o Xampp esteja instalado em sua máquina

- Criar um banco de dados no MySQL com o nome de "blogcake" (Caso escolha outro nome ou tenha usuário configurado no MySQL, será necessário fazer as alterações no arquivo "database.php" localizado dentro do diretório app/config na pasta da aplicação)

  - Criar a tabela "posts" utilizando o código abaixo

    ```sql
    -- Primeiro, criamos nossa tabela de posts
    CREATE TABLE posts (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50),
        body TEXT,
        created DATETIME DEFAULT NULL,
        modified DATETIME DEFAULT NULL,
        user_id INT(11)
    );
    ```

  - Criar a tabela "users" utilizando o código abaixo

    ```sql
    CREATE TABLE users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50),
        password VARCHAR(255),
        role VARCHAR(20),
        created DATETIME DEFAULT NULL,
        modified DATETIME DEFAULT NULL
    );
    ```

  - Acessar utilizando o link http://localhost/cakeblog

    

- Sobre o projeto:

  - Tutorial através do link: [Blog - 2.x (cakephp.org)](https://book.cakephp.org/2/pt/tutorials-and-examples/blog/blog.html)
  - Foram inseridas algumas funções que não estão no tutorial, como por exemplo: a exclusão e edição de uma determinada postagem através da tela de visualização