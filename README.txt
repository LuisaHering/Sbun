Instruções de Configuração do Projeto SBUN (para a database)
==========================

1. Configurando os Arquivos PHP:

 -Certifique-se de que o XAMPP (ou qualquer pacote AMP) esteja instalado no seu computador.
 -Copie a pasta do projeto para o diretório 'htdocs' da sua instalação do XAMPP.
 -Exemplo de caminho: C:\xampp\htdocs\SBUN

2. Importando o Banco de Dados:

 -Abra o Painel de Controle do XAMPP e inicie o 'Apache' e o 'MySQL'.
 -Abra um navegador web e vá para 'http://localhost/phpmyadmin'.
 -Crie um novo banco de dados chamado 'sbun'.
 -Selecione o banco de dados 'sbun', clique na aba 'Importar', escolha o arquivo .sql fornecido e clique em 'Executar'.

3.Configurando a Conexão com o Banco de Dados (se necessário):

 -O projeto está configurado para se conectar ao MySQL com as seguintes credenciais padrão:
     Host: 'localhost'
     Username: 'root'
     Password: ''
     Database: 'sbun'
 -Se a sua configuração usa credenciais diferentes, atualize os detalhes da conexão no seguinte arquivo:
/caminho/para/SuaPastaDoProjeto/db_connection.php (Ajuste o caminho do arquivo conforme necessário.)




