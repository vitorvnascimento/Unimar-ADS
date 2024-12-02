<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Devs</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 20px;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6f7ff;
        }

        th {
            padding: 12px;
            background-color: #380B61;
            color: white;
            text-transform: uppercase;
        }

        .btn-icon {
            cursor: pointer;
            background: none;
            border: none;
            padding: 5px;
            margin: 0 5px;
            transition: color 0.2s ease-in-out;
        }

        .btn-icon .material-icons {
            font-size: 24px;
            color: #555;
        }

        .btn-icon:hover .material-icons {
            color: #380B61;
        }

        a {
            text-decoration: none;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px;
            background-color: #380B61;
            color: white;
            border: none;
            border-radius: 5px;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .back-btn:hover {
            opacity: 80%;
        }
    </style>
</head>

<body>
    <center>
        <h1>Devs Cadastrados</h1>

        <table>
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>SOBRENOME</th>
                    <th>EMAIL</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT id_dev, NOME, SOBRENOME, EMAIL FROM DEV");

                if (mysqli_num_rows($dados_select) > 0) {
                    while ($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($dado['NOME']) . '</td>';
                        echo '<td>' . htmlspecialchars($dado['SOBRENOME']) . '</td>';
                        echo '<td>' . htmlspecialchars($dado['EMAIL']) . '</td>';
                        echo '<td>
                                <form action="editar.php" method="GET" style="display: inline;">
                                    <input type="hidden" name="id_dev" value="' . htmlspecialchars($dado['id_dev']) . '">
                                    <button type="submit" class="btn-icon" title="Editar">
                                        <span class="material-icons">edit</span>
                                    </button>
                                </form>
                                <form action="excluir.php" method="POST" style="display: inline;" onsubmit="return confirm(\'Tem certeza que deseja excluir este registro?\');">
                                    <input type="hidden" name="id_dev" value="' . htmlspecialchars($dado['id_dev']) . '">
                                    <button type="submit" class="btn-icon" title="Excluir">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                              </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">Nenhum registro encontrado.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <a href="index.html" class="back-btn">Voltar</a>
    </center>
</body>

</html>