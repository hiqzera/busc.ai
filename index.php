<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo-index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Agend.ai</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
   <header>
      <div class="container-fluid">
         <div class="row">
            <div class="cabecalho-logado bg-secondary text-white">
               <a href="apresentacao.html" class="btn-home" style="margin-left: 1rem; margin-top: .5rem;">agend.ai</a>
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
   <div id="resultados"></div>
   <hr>
   
   <footer>
      <div class="map" style="margin-bottom: 3rem;">
         <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3029.655403004536!2d-49.27056183137198!3d-25.442015687030473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1711146961294!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0"  allowfullscreen="" loading="lazy"></iframe>
         </div>
     </div>
   </footer>
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script>
    document.addEventListener("DOMContentLoaded", function() {
        const empresas = [
            { nome: "Barbearia", categoria: "Serviços de Beleza", icone: "fa-scissors" },
            { nome: "Tatuagem", categoria: "Serviços de Beleza", icone: "fa-pen-nib" },
            { nome: "Limpeza de Casa", categoria: "Serviços Domésticos", icone: "fa-broom" },
            { nome: "Banho e Tosa para Pet", categoria: "Serviços para Animais", icone: "fa-paw" }
            // Adicione mais empresas conforme necessário
        ];

        const searchInput = document.getElementById("searchInput");
        const resultadosContainer = document.getElementById("resultados");

        searchInput.addEventListener("input", function() {
            const termoPesquisa = this.value.toLowerCase();
            const resultadosFiltrados = empresas.filter(function(empresa) {
                return empresa.nome.toLowerCase().includes(termoPesquisa);
            });

            mostrarResultados(resultadosFiltrados);
        });

        function mostrarResultados(resultados) {
            resultadosContainer.innerHTML = "";

            resultados.forEach(function(empresa) {
                const elementoEmpresa = document.createElement("div");
                elementoEmpresa.innerHTML = `
                    <h3><i class="fas ${empresa.icone}"></i> ${empresa.nome}</h3>
                    <p>Categoria: ${empresa.categoria}</p>
                    <hr>
                `;
                elementoEmpresa.addEventListener("click", function() {
                    searchInput.value = empresa.nome;
                    resultadosContainer.innerHTML = "";
                });
                resultadosContainer.appendChild(elementoEmpresa);
            });
        }
    });
   </script>

</body>
</html>
