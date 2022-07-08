<?php
// Require composer autoload
require_once("../vendor/autoload.php");
require_once("conexaoBanco.php");

$sql = "SELECT a.nome as nomeAluno, a.sobrenome as sobrenomeAluno, p.nome as nomePlano, v.* FROM alunos as a inner join vendas as v on a.idAluno = v.alunos_idAluno
                    inner join planos as p on p.idPlano = v.planos_idPlano";
$query = $con->query($sql) or die($con->error);

// Create an instance of the class:


$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML('
<style>
h2,h3,p {
    font-family: "Arial";
}
h3 {
    color: #222;
}
</style>
');


$mpdf->WriteHTML('

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/basestyle/style.css">
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/moment.min.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/css/dataTables.bootstrap4.css"></script>
    <script src="../assets/css/dataTables.responsive.css"></script>


    
    <!--<link rel="stylesheet" href="../css/indexPhp.css">-->
    <title>Focus Body | ADM</title>
</head>
');



// Write some HTML code:


$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<h3>VENDAS:</h3>');
$mpdf->WriteHTML('<br>');



$mpdf->WriteHTML('<table id="example" class="table table-striped mb-4 bg-white table-bordered">');

while($row = $query->fetch_assoc()){

    $mpdf->WriteHTML('<tr>');

        $mpdf->WriteHTML("<td>".strtoupper($row["nomeAluno"]." ".$row["sobrenomeAluno"])."</td>");

        $mpdf->WriteHTML("<td>".strtoupper($row["nomePlano"])."</td>");

        $mpdf->WriteHTML("<td>".date('d/m/Y', strtotime($row['data']))."</td>");

        $mpdf->WriteHTML("<td>".$row['formaPagamento']."</td>");
            


    $mpdf->WriteHTML('</tr>');

}

$mpdf->WriteHTML('</table>');
$mpdf->OutPut();





