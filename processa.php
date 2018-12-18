<?php

    include_once('conecta.php');

    $campo = "%{$_POST['campo']}%";

    $sql = $mysqli->prepare('select * from tb_produtos where descricao like ?');
    $sql->bind_param("s", $campo);
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