<!-- views/consulta/updateConsulta.php -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            color: #3E6B3E;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-salvar {
            background-color: #689068;
            color: white;
            font-weight: 700;
        }

        .btn-salvar:hover {
            background-color: #557A55;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Editar Consulta</h1>

        <form action="index.php?rota=consulta_update_post" method="POST">
            <input type="hidden" name="consulta_id" value="<?= htmlspecialchars($consulta['id']) ?>" />

            <div class="mb-3">
                <label for="area_atuacao" class="form-label">Área de Atuação:</label>
                <select id="area_atuacao" name="area_atuacao" class="form-select" required>
                    <option value="">Selecione a especialidade</option>
                    <?php
                    $areas = ['Angiologia', 'Cardiologia', 'Clínica Médica', 'Dermatologia', 'Geriatria', 'Ginecologia', 'Urologia', 'Hemograma'];
                    foreach ($areas as $area) {
                        $selected = ($consulta['area_atuacao'] === $area) ? 'selected' : '';
                        echo "<option value=\"$area\" $selected>$area</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="medico" class="form-label">Médico:</label>
                <input type="text" id="medico" name="medico" class="form-control" value="<?= htmlspecialchars($consulta['medico']) ?>" required />
            </div>

            <div class="mb-3">
                <label for="horario" class="form-label">Horário:</label>
                <input type="datetime-local" id="horario" name="horario" class="form-control"
                    value="<?= date('Y-m-d\TH:i', strtotime($consulta['horario'])) ?>" required />
            </div>

            <button type="submit" class="btn btn-salvar w-100">Salvar Alterações</button>
        </form>

        <div class="mt-3 text-center">
            <a href="index.php?rota=consulta_read" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>

</body>

</html>
