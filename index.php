<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Busca sem refresh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- css -->
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css" />

    <!-- javascript -->
    <script src="jquery-3.3.1.js"></script>    
    <script src="javascript.js"></script>

</head>
<body>
    <h1>Busca sem refresh</h1>

    <form>

        Buscar por: <input type="text" name="campo" id="campo">

        <div id="resultado">

            <?php 

                include_once("conecta.php");
                $sql = $mysqli->prepare("select * from tb_produtos order by descricao");
                $sql->execute();
                $sql->bind_result($id, $descricao, $vlr, $data);     

                echo "
                    <table>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Descrição</td>
                                <td>Valor</td>
                                <td>Dt. Cadastro</td>
                            </tr>
                        </thead>
                        <tbody";

                    while ($sql->fetch()) {

                       $dt = date('d-m-Y', strtotime($data));
                        
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$descricao</td>
                            <td>$vlr</td>
                            <td>$dt</td>
                        </tr>";
                    }
                    echo "</tbody>
                    </table>";

            ?>

        </div>
    
    </form>
</body>
</html>