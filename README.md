# 💰 Gestão de Receitas e Despesas

Este projeto é uma aplicação web simples e eficiente, desenvolvida em PHP e MySQL, para o controle e gestão de receitas e despesas pessoais, auxiliando no monitoramento financeiro.

---

## 🏗️ Estrutura do Projeto

O projeto é organizado com base em arquivos PHP para cada funcionalidade principal (listagem, cadastro, edição, salvamento) e arquivos estáticos:

| Pasta/Arquivo | Descrição |
| :--- | :--- |
| **css/** | Contém arquivos de estilo CSS (Bootstrap e estilos personalizados). |
| **js/** | Contém arquivos JavaScript (Bootstrap e scripts auxiliares). |
| **config.php** | Arquivo crucial para as **configurações de conexão com o banco de dados** (MySQL/MariaDB). |
| **index.php** | O **Ponto de Entrada** da aplicação, responsável pela navegação (roteamento de páginas) e exibição do conteúdo principal. |
| **script.sql** | Contém os comandos SQL para criar as tabelas necessárias (`lancamento`, `categoria`, `saldo`). |
| --- | --- |
| **cadastrar-categoria.php** | Formulário para cadastrar novas categorias. |
| **editar-categoria.php** | Formulário para editar categorias existentes. |
| **listar-categoria.php** | Lista todas as categorias cadastradas. |
| **salvar-categoria.php** | **Processa a lógica de Cadastro, Edição e Exclusão de categorias.** |
| --- | --- |
| **cadastrar-lancamento.php** | Formulário para cadastrar novos lançamentos (Receitas e Despesas). |
| **editar-lancamento.php** | Formulário para editar lançamentos existentes. |
| **listar-lancamento.php** | Lista todos os lançamentos registrados no sistema. |
| **salvar-lancamento.php** | **Processa a lógica de Cadastro, Edição e Exclusão de lançamentos e atualiza o saldo total.** |
| **consultar-saldo.php** | Exibe o saldo total da conta, consultando a tabela `saldo` (mais eficiente). |

---

## ⚙️ Instalação

Para configurar e rodar o projeto localmente:

1.  **Clone ou Baixe:** Clone o repositório ou faça o download do projeto para o diretório `htdocs` (XAMPP/MAMP) ou `www` (WAMP).
2.  **Configurar BD:** Importe o arquivo `script.sql` no seu servidor de banco de dados (Ex: usando phpMyAdmin) para criar as tabelas (`lancamento`, `categoria`, `saldo`).
3.  **Credenciais:** Edite o arquivo **`config.php`** para configurar as credenciais de conexão com o seu banco de dados (servidor, usuário, senha, nome do BD).
4.  **Acesso:** Abra o arquivo `index.php` em um servidor web local.

---

## 🖱️ Uso

* Utilize o menu de navegação para acessar as áreas de **Lançamentos** e **Categorias**.
* O saldo total é calculado e mantido na tabela `saldo`, sendo atualizado automaticamente a cada transação (cadastro, edição ou exclusão).

---

## 🤝 Contribuição

Sinta-se à vontade para contribuir com melhorias, correções de bugs ou sugestões de funcionalidades.

1.  Faça um fork do repositório.
2.  Crie uma nova branch (`git checkout -b feature/minha-melhoria`).
3.  Commit suas alterações (`git commit -m 'feat: Adiciona nova funcionalidade X'`).
4.  Envie para o seu fork (`git push origin feature/minha-melhoria`).
5.  Abra um Pull Request.