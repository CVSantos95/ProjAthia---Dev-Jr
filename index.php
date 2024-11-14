<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>Projeto Caio</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">ProjCaio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastro
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="?page=novo_empresa">Empresa</a></li>
              <li><a class="dropdown-item" href="?page=novo_setor">Setor</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pesquisa
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="?page=listar_empresa"> Pesquisa Empresa</a></li>
              <li><a class="dropdown-item" href="?page=listar_setor"> Pesquisa Setor</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Relatorios
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="?page=relatorio">Geral</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <?php
        include("config.php");
        switch (@$_REQUEST["page"]) {
          case "novo_empresa":
            include("Form_Empresa_Novo.php");
            break;

          case "novo_setor":
            include("Form_Setor_Novo.php");
            break;

          case "relatorio":
            include("Form_Relatorio.php");
            break;

          case "listar_empresa":
            include("Form_Empresa_Pesquisar.php");
            break;

          case "listar_setor":
            include("Form_Setor_Pesquisar.php");
            break;

          case "editar_empresa":
            include("Form_Empresa_Editar.php");
            break;

          case "editar_setor":
            include("Form_Setor_Editar.php");
            break;

          case "gravar_empresa":
            include("Form_Empresa_Gravar.php");
            break;

          case "gravar_setor":
            include("Form_Setor_Gravar.php");
            break;

          default:
            print "Projeto - Caio";
        }
        ?>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>