<?php
// gerar_curriculo.php
function e($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

// Recebe POST (protege caso alguém acesse direto)
$post = $_POST ?? [];
if (empty($post) || !isset($post['nome'])) {
    // simples redirecionamento para form se nada enviado
    header('Location: index.php');
    exit;
}

// Normalizar arrays (se não existirem, criar vazios)
$formacoes = $post['formacoes'] ?? [];
$experiencias = $post['experiencias'] ?? [];
$habilidades = isset($post['habilidades']) ? array_filter(array_map('trim', explode(',', $post['habilidades']))) : [];
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Currículo — <?= e($post['nome']) ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Estilos extras para o CV bonito */
    .cv-container { max-width: 900px; margin: 30px auto; background: #fff; padding: 28px; border-radius: 8px; box-shadow: 0 6px 20px rgba(0,0,0,0.07); }
    .cv-header { border-bottom: 2px solid #f1f1f1; padding-bottom: 12px; margin-bottom: 18px; }
    .name { font-size: 28px; font-weight: 700; }
    .muted { color: #6c757d; }
    @media print { .no-print { display:none !important; } body { background: white; } .cv-container { box-shadow: none; } }
  </style>
</head>
<body class="bg-light">

<div class="container">
  <div class="cv-container">
    <div class="cv-header d-flex justify-content-between align-items-start">
      <div>
        <div class="name"><?= e($post['nome']) ?></div>
        <div class="muted"><?= e($post['email']) ?> <?php if(!empty($post['telefone'])) echo ' | '.e($post['telefone']); ?></div>
        <?php if(!empty($post['endereco'])): ?><div class="muted small mt-1"><?= e($post['endereco']) ?></div><?php endif; ?>
        <div class="mt-2">
          <?php if(!empty($post['linkedin'])): ?><a href="<?= e($post['linkedin']) ?>" target="_blank" class="me-2 small">LinkedIn</a><?php endif; ?>
          <?php if(!empty($post['portfolio'])): ?><a href="<?= e($post['portfolio']) ?>" target="_blank" class="small">Portfólio</a><?php endif; ?>
        </div>
      </div>
      <div class="text-end">
        <?php if(!empty($post['dob'])): ?><div class="muted small">Nasc.: <?= e($post['dob']) ?></div><?php endif; ?>
        <?php if(!empty($post['idade'])): ?><div class="muted small">Idade: <?= e($post['idade']) ?></div><?php endif; ?>
      </div>
    </div>

    <!-- Formação -->
    <?php if(!empty($formacoes)): ?>
      <section class="mb-4">
        <h6 class="text-uppercase fw-bold small">Formação</h6>
        <?php foreach($formacoes as $f): ?>
          <div class="mb-2">
            <div class="fw-semibold"><?= e($f['curso'] ?? '') ?></div>
            <div class="muted small"><?= e($f['instituicao'] ?? '') ?> <?php if(!empty($f['inicio']) || !empty($f['fim'])): ?> — <?= e($f['inicio'] ?? '') ?> <?= !empty($f['fim']) ? '– '.e($f['fim']) : '' ?><?php endif; ?></div>
            <?php if(!empty($f['descricao'])): ?><div class="mt-1"><?= nl2br(e($f['descricao'])) ?></div><?php endif; ?>
          </div>
        <?php endforeach; ?>
      </section>
    <?php endif; ?>

    <!-- Experiências -->
    <?php if(!empty($experiencias)): ?>
      <section class="mb-4">
        <h6 class="text-uppercase fw-bold small">Experiência profissional</h6>
        <?php foreach($experiencias as $exp): ?>
          <div class="mb-2">
            <div class="fw-semibold"><?= e($exp['cargo'] ?? '') ?> <?php if(!empty($exp['empresa'])): ?><span class="muted"> — <?= e($exp['empresa']) ?></span><?php endif; ?></div>
            <?php if(!empty($exp['inicio']) || !empty($exp['fim'])): ?><div class="muted small"><?= e($exp['inicio'] ?? '') ?> <?= !empty($exp['fim']) ? '– '.e($exp['fim']) : '' ?></div><?php endif; ?>
            <?php if(!empty($exp['descricao'])): ?><div class="mt-1"><?= nl2br(e($exp['descricao'])) ?></div><?php endif; ?>
          </div>
        <?php endforeach; ?>
      </section>
    <?php endif; ?>

    <!-- Habilidades -->
    <?php if(!empty($habilidades)): ?>
      <section class="mb-4">
        <h6 class="text-uppercase fw-bold small">Habilidades</h6>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach($habilidades as $h): ?>
            <span class="badge bg-secondary"><?= e($h) ?></span>
          <?php endforeach; ?>
        </div>
      </section>
    <?php endif; ?>

    <div class="mt-4 no-print">
      <button onclick="window.print()" class="btn btn-success">Imprimir / Salvar como PDF</button>
      <a href="index.php" class="btn btn-outline-secondary ms-2">Voltar e editar</a>
    </div>

  </div>
</div>

</body>
</html>
