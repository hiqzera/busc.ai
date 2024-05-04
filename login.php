<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <link rel="stylesheet" href="form.css" />
    <link rel="shortcut icon" type="imagex/jpg" href="img/logo_nova.jpg">
    <title>Busc.ai</title>
</head>

<body>

    <div class="form-container">
        <div id="imagem-log"><img src="img/logo_nova.jpg" width="80%" alt=""></div>
        <div>
            <h3 class="tittle">Busc.ai</h3>
        </div>

        <form action="index.php" method="post">
            <div class="mb-3"><input type="text" name="user" placeholder="Usuário"></div>
            <div class="mb-3"><input type="password" name="pw" placeholder="Senha"></div>

            <?php
            session_start();

            $erro = '';

            if (!isset($_SESSION['login'])) {
                if (isset($_POST['login'])) {
                    include "config.php";

                    $user = $_POST['user'];
                    $senha = $_POST['pw'];

                    if (empty($user) || empty($senha)) {
                        $erro = "Por favor, preencha ambos o nome de usuário e a senha.";
                    } else {
                        $login = $conn->prepare('SELECT id, pw_log FROM `registro` WHERE user_log = :user');
                        $login->bindValue(":user", $user);
                        $login->execute();

                        if ($login->rowCount() > 0) {
                            $cons = $login->fetch();
                            $senha_hash = $cons['pw_log'];

                            if (password_verify($senha, $senha_hash)) {
                                $id = $cons['id'];
                                $_SESSION['login'] = $id;
                                header("location: index.php");
                                exit();
                            } else {
                                $erro = "Nome de usuário ou senha inválidos!";
                            }
                        } else {
                            $erro = "Nome de usuário ou senha inválidos!";
                        }
                    }
                }
            }
            ?>
            <?php if ($erro != '') : ?>
                <div class="erro"><?php echo $erro; ?></div>
            <?php endif; ?>

            <button type="submit" name="login" value="Login" class="btn btn-primary">Entrar</button>
        </form>

        <div id="links">
            <a href="#">
                <p>Esqueci minha senha</p>
            </a>
            <a href="cadastro_pf.html">
                <p>Cadastre como Cliente</p>
            </a>
            <a href="cadastro_pj.html">
                <p>Cadastre como Empresa</p>
            </a>
        </div>
    </div>
</body>

</html>
