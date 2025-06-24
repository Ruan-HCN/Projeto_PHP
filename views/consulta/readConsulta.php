<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Minhas Consultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-image: url('../../assets/images/Backgorund_2.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        h1 {
            color: #3E6B3E;
            font-weight: 700;
            margin-bottom: 20px;
        }

        table {
            background-color: white;
        }

        .btn-editar {
            background-color: #ffc107;
            color: white;
        }

        .btn-excluir {
            background-color: #dc3545;
            color: white;
        }

        .btn-voltar {
            background-color: #3E6B3E;
            color: white;
        }

        .btn-voltar:hover {
            transform: scale(1.1);
            background-color: rgb(89, 165, 89);
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Minhas Consultas</h1>

        <?php if (empty($consultas)): ?>
            <p>Você ainda não possui consultas agendadas.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Área de Atuação</th>
                        <th>Médico</th>
                        <th>Horário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= htmlspecialchars($consulta['area_atuacao']) ?></td>
                            <td><?= htmlspecialchars($consulta['medico']) ?></td>
                            <td><?= htmlspecialchars($consulta['horario']) ?></td>
                            <td>
                                <form action="index.php?rota=consulta_update_form" method="POST" style="display:inline;">
                                    <input type="hidden" name="consulta_id" value="<?= htmlspecialchars($consulta['consulta_id']) ?>" />
                                    <button type="submit" class="btn btn-sm btn-editar">Editar</button>
                                </form>

                                <form action="index.php?rota=consulta_delete_post" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta consulta?');">
                                    <input type="hidden" name="consulta_id" value="<?= htmlspecialchars($consulta['consulta_id']) ?>" />
                                    <button type="submit" class="btn btn-sm btn-excluir">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <a href="index.php?rota=dashboard_usuario" class="btn btn-voltar mt-3">Voltar ao Dashboard</a>
    </div>

</body>

</html>
