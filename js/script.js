// js/script.js
$(function() {
  // cálculo de idade (preciso)
  $('#dob').on('change input', function() {
    var val = $(this).val();
    if (!val) { $('#idade').val(''); return; }
    var dob = new Date(val);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) age--;
    $('#idade').val(age);
  });

  // Limpar formulário
  $('#resetBtn').on('click', function() {
    if (confirm('Deseja limpar todos os campos?')) {
      $('#cvForm')[0].reset();
      $('#formacoes').empty();
      $('#experiencias').empty();
      // re-add 1 bloco inicial
      addFormacao();
      addExperiencia();
    }
  });

  // Templates dinamicos
  var formIndex = 0;
  function formacaoTemplate(i) {
    return `<div class="card mb-2 p-3 position-relative" data-idx="${i}">
      <button type="button" class="btn-close position-absolute top-2 end-2 remove-formacao" aria-label="Remover"></button>
      <div class="mb-2"><input name="formacoes[${i}][curso]" class="form-control" placeholder="Curso (ex: Bacharel em Sistemas)"></div>
      <div class="row g-2">
        <div class="col-md-6"><input name="formacoes[${i}][instituicao]" class="form-control" placeholder="Instituição"></div>
        <div class="col-md-3"><input name="formacoes[${i}][inicio]" class="form-control" placeholder="Início (ex: 2018)"></div>
        <div class="col-md-3"><input name="formacoes[${i}][fim]" class="form-control" placeholder="Fim (ex: 2022)"></div>
      </div>
      <div class="mt-2"><textarea name="formacoes[${i}][descricao]" class="form-control" placeholder="Descrição (opcional)" rows="2"></textarea></div>
    </div>`;
  }
  var expIndex = 0;
  function experienciaTemplate(i) {
    return `<div class="card mb-2 p-3 position-relative" data-idx="${i}">
      <button type="button" class="btn-close position-absolute top-2 end-2 remove-exp" aria-label="Remover"></button>
      <div class="mb-2"><input name="experiencias[${i}][cargo]" class="form-control" placeholder="Cargo"></div>
      <div class="mb-2"><input name="experiencias[${i}][empresa]" class="form-control" placeholder="Empresa"></div>
      <div class="row g-2">
        <div class="col-md-6"><input name="experiencias[${i}][inicio]" class="form-control" placeholder="Início (ex: 2020-01)"></div>
        <div class="col-md-6"><input name="experiencias[${i}][fim]" class="form-control" placeholder="Fim (ex: 2021-12 ou Atual)"></div>
      </div>
      <div class="mt-2"><textarea name="experiencias[${i}][descricao]" class="form-control" placeholder="Principais atividades" rows="2"></textarea></div>
    </div>`;
  }

  function addFormacao() {
    $('#formacoes').append(formacaoTemplate(formIndex++));
  }
  function addExperiencia() {
    $('#experiencias').append(experienciaTemplate(expIndex++));
  }

  // Event listeners
  $('#addFormacao').on('click', addFormacao);
  $('#addExp').on('click', addExperiencia);

  // Delegation para remover blocos
  $('#formacoes').on('click', '.remove-formacao', function() {
    $(this).closest('[data-idx]').remove();
  });
  $('#experiencias').on('click', '.remove-exp', function() {
    $(this).closest('[data-idx]').remove();
  });

  // Adiciona um bloco inicial para usabilidade
  addFormacao();
  addExperiencia();
});
