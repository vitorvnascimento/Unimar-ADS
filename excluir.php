<?php
require("conecta.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = intval($_POST['id_dev']);

  $query = "DELETE FROM DEV WHERE id_dev = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "Registro excluído com sucesso!";
  } else {
    echo "Erro ao excluir o registro: " . $conn->error;
  }
  $stmt->close();
  $conn->close();
  header("Location: visualiza_dev.php");
}
