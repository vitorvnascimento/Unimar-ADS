<?php
require("conecta.php");


if (isset($_GET['id_dev']) && !empty($_GET['id_dev'])) {
  $id_dev = $_GET['id_dev'];


  $query = "SELECT NOME, SOBRENOME, EMAIL FROM DEV WHERE id_dev = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id_dev);
  $stmt->execute();
  $result = $stmt->get_result();


  if ($result->num_rows > 0) {
    $dado = $result->fetch_assoc();
  } else {
    die("Registro não encontrado!");
  }

  $stmt->close();
} else {
  die("ID inválido ou não fornecido!");
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Desenvolvedor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7fc;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      margin-top: 50px;
      color: #333;
    }

    .form-container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      background-color: #59429d;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }

    button:hover {
      opacity: 80%;
    }

    .form-container p {
      text-align: center;
      font-size: 14px;
      color: #666;
    }

    .form-container p a {
      color: #59429d;
      text-decoration: none;
    }

    .form-container p a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <h1>Editar Desenvolvedor</h1>

  <div class="form-container">
    <form action="atualizar.php" method="post">
      <input type="hidden" name="id_dev" value="<?php echo htmlspecialchars($id_dev); ?>">

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($dado['NOME']); ?>" required>

      <label for="sobrenome">Sobrenome:</label>
      <input type="text" name="sobrenome" id="sobrenome" value="<?php echo htmlspecialchars($dado['SOBRENOME']); ?>" required>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($dado['EMAIL']); ?>" required>

      <button type="submit">Atualizar</button>

      <p><a href="visualiza_dev.php">Voltar à visualização de desenvolvedores</a></p>
    </form>
  </div>

</body>

</html>