document.addEventListener('DOMContentLoaded', function() {
    const areaSelect = document.getElementById('areaAtuacao');
    const medicoSelect = document.getElementById('medico');

    const medicosPorArea = {
        "Angiologia": ["Dr. João Souza", "Dra. Ana Ribeiro"],
        "Cardiologia": ["Dr. Carlos Silva", "Dra. Marina Oliveira"],
        "Clínica Médica": ["Dr. Pedro Almeida", "Dra. Juliana Costa"],
        "Dermatologia": ["Dr. Lucas Mendes", "Dra. Beatriz Lima"],
        "Geriatria": ["Dr. Renato Torres", "Dra. Helena Martins"],
        "Ginecologia": ["Dr. Felipe Rocha", "Dra. Camila Santos"],
        "Urologia": ["Dr. Eduardo Gomes", "Dra. Patrícia Nunes"],
        "Hemograma": ["Dr. Ricardo Dias", "Dra. Larissa Ferreira"]
    };

    // Preenche select de médicos ao mudar a área
    areaSelect.addEventListener('change', function() {
        const areaSelecionada = areaSelect.value;

        // Limpar opções anteriores
        medicoSelect.innerHTML = '<option value="">Selecione o médico</option>';

        if (areaSelecionada && medicosPorArea[areaSelecionada]) {
            medicosPorArea[areaSelecionada].forEach(function(medico) {
                const option = document.createElement('option');
                option.value = medico;
                option.textContent = medico;
                medicoSelect.appendChild(option);
            });
        }
    });

    // Função para setar valores iniciais da consulta editada
    window.preencherFormulario = function(areaAtual, medicoAtual, horarioAtual) {
        // Setar área selecionada
        areaSelect.value = areaAtual;

        // Acionar o evento para preencher médicos conforme a área
        areaSelect.dispatchEvent(new Event('change'));

        // Selecionar o médico após opções carregadas
        setTimeout(() => {
            medicoSelect.value = medicoAtual;
        }, 50);

        // Selecionar horário atual
        const horarioSelect = document.getElementById('horario');
        horarioSelect.value = horarioAtual;
    }
});
