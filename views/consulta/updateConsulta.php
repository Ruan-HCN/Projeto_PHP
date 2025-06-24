<!-- views/consulta/updateConsulta.php -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Consulta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-image: url('../../assets/images/Backgorund_2.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            overflow-x: hidden;
        }

        .container {
            padding: 50px 15px;
            max-width: 600px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3E6B3E;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: 600;
        }

        .btn-salvar {
            background-color: #689068;
            color: white;
            font-weight: 700;
            border-radius: 8px;
            padding: 12px 20px;
            border: none;
            width: 100%;
            transition: 0.3s;
        }

        .btn-salvar:hover {
            background-color: #557A55;
            transform: scale(1.05);
        }

        .btn-cancelar {
            margin-top: 15px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Editar Consulta</h1>

        <form id="editarConsultaForm" action="index.php?rota=consulta_update_post" method="POST">
            <input type="hidden" name="consulta_id" value="<?= htmlspecialchars($consulta['consulta_id']) ?>" />

            <!-- Área de Atuação -->
            <div class="mb-3">
                <label for="areaAtuacao" class="form-label">Área de Atuação:</label>
                <select id="areaAtuacao" name="area_atuacao" class="form-select" required>
                    <option value="">Selecione a especialidade</option>
                    <option>Angiologia</option>
                    <option>Cardiologia</option>
                    <option>Clínica Médica</option>
                    <option>Dermatologia</option>
                    <option>Geriatria</option>
                    <option>Ginecologia</option>
                    <option>Urologia</option>
                    <option>Hemograma</option>
                </select>
            </div>

            <!-- Médico -->
            <div class="mb-3">
                <label for="medico" class="form-label">Médico:</label>
                <select id="medico" name="medico" class="form-select" required>
                    <option value="">Selecione o médico</option>
                </select>
            </div>

            <!-- Horário -->
            <div class="mb-3">
                <label for="horario" class="form-label">Horário:</label>
                <select id="horario" name="horario" class="form-select" required>
                    <option value="">Selecione o horário</option>
                    <option value="2025-06-20 09:00:00">20/06/2025 - 09:00</option>
                    <option value="2025-06-20 10:30:00">20/06/2025 - 10:30</option>
                    <option value="2025-06-20 14:00:00">20/06/2025 - 14:00</option>
                    <option value="2025-06-21 09:00:00">21/06/2025 - 09:00</option>
                    <option value="2025-06-21 11:00:00">21/06/2025 - 11:00</option>
                    <option value="2025-06-21 15:00:00">21/06/2025 - 15:00</option>
                </select>
            </div>

            <button type="submit" class="btn btn-salvar">Salvar Alterações</button>
        </form>

        <a href="index.php?rota=consulta_read" class="btn btn-secondary btn-cancelar">Cancelar</a>
    </div>

    <script src="../../assets/js/updateConsulta.js"></script>

    <script>
        // Chama a função do JS externo para preencher os selects
        preencherFormulario(
            <?= json_encode($consulta['area_atuacao']) ?>,
            <?= json_encode($consulta['medico']) ?>,
            <?= json_encode($consulta['horario']) ?>
        );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
