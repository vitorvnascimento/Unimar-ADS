<?php
require("conecta.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = intval($_POST['id_dev']);
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];

  $query = "UPDATE DEV SET NOME = ?, SOBRENOME = ?, EMAIL = ? WHERE id_dev = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sssi", $nome, $sobrenome, $email, $id);

  if ($stmt->execute()) {
    echo "Registro atualizado com sucesso!";
  } else {
    echo "Erro ao atualizar o registro: " . $conn->error;
  }
  $stmt->close();
  $conn->close();
  header("Location: visualiza_dev.php");
}
