
# Gerador de Currículos

Projeto desenvolvido por Helder Borges para a disciplina de Fundamentos da programação para internet.  
O sistema permite que o usuário preencha seus dados pessoais, experiências profissionais e referências, gerando automaticamente um currículo formatado para visualização e impressão.

---

##   Funcionalidades

-  Cadastro de dados pessoais (nome, idade, data de nascimento, contato)
-  Cálculo automático da idade com **JavaScript**
-  Adição dinâmica de **experiências profissionais** e **referências pessoais** usando jQuery
-  Geração automática do currículo com **PHP**
-  Opção de impressão/download usando `window.print()`
-  Interface moderna feita com **Bootstrap 5**

---

##  Tecnologias utilizadas

- **PHP **
- **HTML5 / CSS3**
- **Bootstrap **
- **JavaScript / jQuery**
- **XAMPP** (para testes locais)
- **Git e GitHub** (para versionamento)

---

##  Estrutura de pastas

gerador-cv/
│
├── index.php
├── gerar_curriculo.php
├── README.md
│
├── css/
│ └── style.css
│
└── js/
└── script.js


## Como executar o projeto localmente

1. Copie o projeto para a pasta do XAMPP: C:\xampp\htdocs\gerador-cv

2. Inicie o **Apache** no XAMPP Control Panel.

3. No navegador, acesse: http://localhost/gerador-cv

4. Preencha o formulário, adicione experiências e gere seu currículo!


## Versionamento com Git

Comandos principais usados durante o desenvolvimento:

```bash
git init
git add .
git commit -m "Primeiro commit"
git branch -M main
git remote add origin https://github.com/heldedm/gerador-cv.git
git push -u origin main


Para cada atualização:
git add .
git commit -m "Descrição da alteração"
git push


Repositório público

https://github.com/heldedm/gerador-cv

Autor

Helder Borges
Desenvolvedor iniciante em PHP e entusiasta de tecnologia.
