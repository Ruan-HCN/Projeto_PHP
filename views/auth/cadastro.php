<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/cadastro.css">
    <script src="../../assets/js/script_cadastro.js"></script>
    <title>cadastro</title>
</head>
<body>
    <main>
        
       <div class="form_container">
            <h1>Registre-se</h1>
            <form action="../../index.php" method="$_POST">


                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" name ="nome" placeholder="Username">
                        <label for="floatingInputGroup1">Nome</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" name ="email" placeholder="Username">
                        <label for="floatingInputGroup1">Email</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" name ="senha" placeholder="Username">
                        <label for="floatingInputGroup1">Senha</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Cadastrar</button>

            </form>

            <p>Já é membro? <a href="login.php">Fazer Login</a></p>
       </div>
    </main>
</body>
</html>