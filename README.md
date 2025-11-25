# Gestão de Receitas e Despesas

Este projeto é uma aplicação web para gestão de receitas e despesas, permitindo o controle financeiro pessoal de forma simples e eficiente.

## Estrutura do Projeto

O projeto é organizado da seguinte forma:

- **css/**: Contém os arquivos de estilo CSS, incluindo o Bootstrap e estilos personalizados.
- **js/**: Contém os arquivos JavaScript do Bootstrap.
- **cadastrar-categoria.php**: Formulário para cadastrar novas categorias de despesas e receitas.
- **cadastrar-lancamento.php**: Formulário para cadastrar novos lançamentos de receitas e despesas.
- **config.php**: Configurações de conexão com o banco de dados.
- **consultar-saldo.php**: Exibe o saldo total da conta, calculando a diferença entre receitas e despesas.
- **editar-categoria.php**: Formulário para editar categorias existentes.
- **editar-lancamento.php**: Formulário para editar lançamentos de receitas e despesas.
- **index.php**: Ponto de entrada para o aplicativo, incluindo a navegação e o conteúdo principal.
- **listar-categoria.php**: Lista todas as categorias de despesas e receitas cadastradas.
- **listar-lancamento.php**: Lista todos os lançamentos de receitas e despesas.
- **salvar-categoria.php**: Processa a lógica para salvar novas categorias no banco de dados.
- **salvar-lancamento.php**: Processa a lógica para salvar novos lançamentos no banco de dados.
- **script.sql**: Contém os comandos SQL para criar as tabelas necessárias no banco de dados.

## Instalação

1. Clone o repositório ou faça o download do projeto.
2. Importe o arquivo `script.sql` no seu banco de dados para criar as tabelas necessárias.
3. Configure as credenciais do banco de dados no arquivo `config.php`.
4. Abra o arquivo `index.php` em um servidor web local (como XAMPP ou WAMP).

## Uso

- Acesse a aplicação pelo navegador e utilize os formulários para cadastrar categorias e lançamentos.
- Consulte o saldo total e visualize as listas de categorias e lançamentos para um controle financeiro eficiente.

## Contribuição

Sinta-se à vontade para contribuir com melhorias ou correções. Para isso, faça um fork do repositório e envie suas alterações através de um pull request.