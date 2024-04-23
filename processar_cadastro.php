<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cpf"]) && isset($_POST["senha"])) {
        $user = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $pw = $_POST["senha"];
        $telefone = $_POST["telefone"];
        $genero = $_POST["genero"];
        $data = $_POST["data"];

        if (empty($user) || empty($email) || empty($pw) || empty($cpf)) {
            echo "Todos os campos obrigatórios devem ser preenchidos.";
        } else {
            $passwordHash = password_hash($pw, PASSWORD_DEFAULT);

            $hostname = "localhost";
            $dbname = "base";
            $usuario = "root";
            $senha = "";

            try {
                $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $usuario, $senha);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO registro (user_log, email, cpf, pw_log, telefone, genero, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);

                $executeSuccess = $stmt->execute([$user, $email, $cpf, $passwordHash, $telefone, $genero, $data]);

                if ($executeSuccess) {
                    echo "Cadastro realizado com sucesso.";
                    header('Location: login.php');
                    exit;
                } else {
                    echo "Erro ao executar o INSERT.";
                }
            } catch (PDOException $e) {
                echo "Erro ao inserir os dados: " . $e->getMessage();
            } finally {
                $pdo = null;
            }
        }
    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
} else {
    echo "Este script deve ser acessado via formulário.";
}
?>