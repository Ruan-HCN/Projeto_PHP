document.addEventListener('DOMContentLoaded', () => {
    fetch('index.php?rota=api_usuario_dados')
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert(data.erro);
                return;
            }

            const usuario = data.usuario;
            const consultas = data.consultas;

            document.getElementById('nomeUsuario').textContent = usuario.nome;
            document.getElementById('nome').textContent = usuario.nome;
            document.getElementById('email').textContent = usuario.email;

            const lista = document.getElementById('listaConsultas');
            lista.innerHTML = '';

            if (consultas.length > 0) {
                consultas.forEach(consulta => {
                    const li = document.createElement('li');
                    li.textContent = `Paciente: ${consulta.paciente} | Área: ${consulta.area_atuacao} | Médico: ${consulta.medico} | Horário: ${consulta.horario}`;
                    lista.appendChild(li);
                });
            } else {
                lista.innerHTML = '<li>Você ainda não possui consultas cadastradas.</li>';
            }
        })
        .catch(error => console.error('Erro ao carregar dados do usuário:', error));
});
