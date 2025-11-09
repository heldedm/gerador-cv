<?php
// index.php
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gerador de Currículo</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery (para simplicidade) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Gerador de CV</a>
    <div>
      <a class="btn btn-outline-secondary btn-sm" href="#">Instruções</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="card shadow-sm">
    <div class="card-body">
      <h3 class="card-title mb-3">Preencha seus dados</h3>

      <form id="cvForm" action="gerar_curriculo.php" method="post" enctype="multipart/form-data">
        <!-- Dados Pessoais -->
        <div class="mb-4">
          <h5>Dados Pessoais</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nome completo</label>
              <input name="nome" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control">
            </div>

            <div class="col-md-4">
              <label class="form-label">Telefone</label>
              <input name="telefone" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Data de nascimento</label>
              <input id="dob" name="dob" type="date" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Idade</label>
              <input id="idade" name="idade" readonly class="form-control bg-white">
            </div>

            <div class="col-12">
              <label class="form-label">Endereço</label>
              <input name="endereco" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">LinkedIn (opcional)</label>
              <input name="linkedin" class="form-control" placeholder="https://linkedin.com/in/usuario">
            </div>
            <div class="col-md-6">
              <label class="form-label">GitHub / Portfólio (opcional)</label>
              <input name="portfolio" class="form-control" placeholder="https://github.com/usuario">
            </div>
          </div>
        </div>

        <!-- Formação (dinâmico) -->
        <div class="mb-4">
          <h5>Formação Acadêmica</h5>
          <div id="formacoes" class="mb-2"></div>
          <button id="addFormacao" type="button" class="btn btn-sm btn-primary">+ Adicionar formação</button>
        </div>

        <!-- Experiências (dinâmico) -->
        <div class="mb-4">
          <h5>Experiência Profissional</h5>
          <div id="experiencias" class="mb-2"></div>
          <button id="addExp" type="button" class="btn btn-sm btn-primary">+ Adicionar experiência</button>
        </div>

        <!-- Habilidades -->
        <div class="mb-4">
          <h5>Habilidades</h5>
          <input name="habilidades" class="form-control" placeholder="Separe por vírgulas: HTML, CSS, JavaScript...">
          <div class="form-text">Separe por vírgulas — serão exibidas como lista no CV.</div>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-success">Gerar currículo (Preview)</button>
          <button id="resetBtn" type="button" class="btn btn-outline-secondary">Limpar formulário</button>
        </div>
      </form>

      <div class="mt-4 text-muted small">
        Dica: adicione pelo menos uma formação e uma experiência. Ao gerar, clique em <strong>Imprimir / Salvar como PDF</strong>.
      </div>
    </div>
  </div>
</div>

<script src="js/script.js"></script>
</body>
</html>
