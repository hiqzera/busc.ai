<?php
// Conexão com o banco de dados (substitua pelos seus detalhes de conexão)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta SQL para buscar os dados das empresas, incluindo o ID
$sql = "SELECT id, nome_empresa, endereco, telefone, horario_funcionamento FROM pj_registro";
$result = $conn->query($sql);

// Array para armazenar os dados das empresas
$empresas = array();

// Verifica se existem resultados da consulta
if ($result->num_rows > 0) {
    // Loop através dos resultados e armazena os dados no array
    while ($row = $result->fetch_assoc()) {
        $empresa = array(
            'id' => $row['id'],
            'nome' => $row['nome_empresa'],
            'endereco' => $row['endereco'],
            'telefone' => $row['telefone'],
            'horario' => $row['horario_funcionamento'],
        );
        array_push($empresas, $empresa);
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo-index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="imagex/jpg" href="img/logo_nova.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Busc.ai</title>
</head>
<body>
   <header>
      <div class="container-fluid">
         <div class="row">
            <div class="cabecalho-logado bg-secondary text-white">
               <a href="apresentacao.html" class="btn-home" style="margin-left: 1rem; margin-top: .5rem;">Busc.ai</a>
               <div>
                   <a class="botao-sair btn btn-secondary" href="logout.php">Sair</a>
                   <a class="botao-head btn btn-secondary" href="cadastro_pf.html">Cadastre-se</a>
               </div>
            </div>
         </div>
      </div>
   </header>
   <br>
   <div id="buscador" class="search-box pesquisa-bar">
         <input id="searchInput" class="search-txt" type="text" name="" placeholder="Faça sua pesquisa">
         <i class="fas fa-search"></i>
   </div>
    <div id="resultados" style="display: none; margin-top: auto;">
    </div>

   <footer>
      <div id="localSelecionado" style="margin-left: 5%; border-radius: 1rem; display: none; width: 90%; background-color: #f2f2f2; padding: 10px; padding-bottom: 15%;">
          <h3 style="margin-left: 1rem;"><span id="nome"></span></h3>
          <p style="margin-left: 1rem;"><i class="fas fa-star"></i> Avaliação: <span id="avaliacao"></span></p>
          <p style="margin-left: 1rem;"><i class="fas fa-map-marker-alt"></i> Endereço: <span id="endereco"></span></p>
          <p style="margin-left: 1rem;"><i class="fas fa-phone"></i> Telefone: <span id="telefone"></span></p>
          <p style="margin-left: 1rem;"><i class="far fa-clock"></i> Horário de Funcionamento: <span id="horario"></span></p>
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy0bZDwlvAhLARkSGunLF3UfQoGRTECAwJcwUbcPaYOQ&s" style="float: left; margin-left: 1rem; position: absolute; border-radius: 1rem; top: 12.5rem;" width="15%" alt="foto">
      </div>
   </footer>   
   <script>
        document.addEventListener("DOMContentLoaded", function() {
    const empresas = <?php echo json_encode($empresas); ?>;

    const searchInput = document.getElementById("searchInput");
    const resultadosContainer = document.getElementById("resultados");
    const nome = document.getElementById("nome");
    const avaliacao = document.getElementById("avaliacao");
    const endereco = document.getElementById("endereco");
    const telefone = document.getElementById("telefone");
    const horario = document.getElementById("horario");

    searchInput.addEventListener("input", function() {
        const termoPesquisa = this.value.toLowerCase();
        const resultadosFiltrados = empresas.filter(function(empresa) {
            return empresa.nome.toLowerCase().startsWith(termoPesquisa);
        });

        mostrarResultados(resultadosFiltrados);
    });

    function mostrarResultados(resultados) {
        resultadosContainer.innerHTML = "";

        if (resultados.length > 0) {
            resultados.forEach(function(empresa) {
                const elementoEmpresa = document.createElement("div");
                elementoEmpresa.innerHTML = `
                    <h3>${empresa.nome}</h3>
                    <p style="margin-left: 1rem;"><i class="fas fa-map-marker-alt"></i> Endereço: ${empresa.endereco}</p style="margin-left: 1rem;">
                    <p style="margin-left: 1rem;"><i class="fas fa-phone"></i> Telefone: ${empresa.telefone}</p style="margin-left: 1rem;">
                    <p style="margin-left: 1rem;"><i class="fas fa-star"></i> Avaliação: ${empresa.avaliacao}</p style="margin-left: 1rem;">
                    <p style="margin-left: 1rem;"><i class="far fa-clock"></i> Horário de Funcionamento: ${empresa.horario}</p style="margin-left: 1rem;">
                    <hr>
                `;
                elementoEmpresa.addEventListener("click", function() {
                    localSelecionado.style.display = "block";
                    searchInput.value = empresa.nome;
                    resultadosContainer.innerHTML = "";
                    nome.textContent = empresa.nome;
                    avaliacao.textContent = empresa.avaliacao;
                    endereco.textContent = empresa.endereco;
                    telefone.textContent = empresa.telefone;
                    horario.textContent = empresa.horario;
                });

                // Adicionando o botão de avaliação
                const button = document.createElement("button");
                button.textContent = "Avaliar";
                button.addEventListener("click", function() {
                    window.location.href = "avaliacao.php?id=" + empresa.id;
                });
                elementoEmpresa.appendChild(button);

                resultadosContainer.appendChild(elementoEmpresa);
            });
            resultadosContainer.style.display = "block"; // Mostrar resultados
        } else {
            resultadosContainer.style.display = "none"; // Ocultar resultados
        }
    }
});
</script>
</body>
</html>
