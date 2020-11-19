<?php
#https://viacep.com.br/ws/01001000/json/
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Consulta CEP </title>
</head>

<body>

    <div class="container-sm">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Consulta CEP</a>
            <form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input class="form-control mr-sm-2" type="search" placeholder="Insira o CEP" aria-label="Search" name="cep">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg></button>
            </form>
        </nav>
    </div>
</body>

</html>

<?php

if ($_POST['cep'] == "") {
    echo '
    <div class="container-sm">
    <div class="alert alert-danger" role="alert">
    Insira um cep!
  </div>
  </div>
  ';
} else {
    $cep = $_POST['cep'];
    $request = file_get_contents("https://viacep.com.br/ws/$cep/json/");
    $decodeJson = json_decode($request, true);
    echo '
    <div class="container-sm"
    <ul class="list-group">
      <li class="list-group-item active">Informações da Consulta</li>
      <li class="list-group-item">logradouro: ' . $decodeJson['logradouro'] . '</li>
      <li class="list-group-item">complemento: ' . $decodeJson['complemento'] . '</li>
      <li class="list-group-item">bairro: ' . $decodeJson['bairro'] . '</li>
      <li class="list-group-item">localidade: ' . $decodeJson['localidade'] . '</li>
      <li class="list-group-item">uf: ' . $decodeJson['uf'] . '</li>
      <li class="list-group-item">ibge: ' . $decodeJson['ibge'] . '</li>
      <li class="list-group-item">gia: ' . $decodeJson['gia'] . '</li>
      <li class="list-group-item">ddd: ' . $decodeJson['ddd'] . '</li>
      <li class="list-group-item">siafi: ' . $decodeJson['siafi'] . '</li>
    </ul>
    </div>
    ';
}




?>
