<?php include_once 'conexaoBanco.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Focus Body | ADM</title>
</head>
<body>
    
    <div class="container-fluid bg-info py-2 text-center">
        <h2 style="color: #FFF;">Alunos</h2>
    </div>


    <div class="container mt-5">
        <button type="button" class="btn btn-info mb-3 m-1" data-toggle="modal" data-target="#newAlunosModal"><span class="material-icons align-text-bottom">add</span></button>
        <button type="button" class="btn btn-info mb-3 m-1"><a href="index.php" class="text-decoration-none"><span class="material-icons align-text-bottom text-white">sell</span></a></button>
        <button type="button" class="btn btn-info mb-3 m-1"><a href="../index.html" class="text-decoration-none"><span class="material-icons align-text-bottom text-white">badge</span></a></button>
        <button type="button" class="btn btn-info mb-3 m-1"><a href="../index.html" class="text-decoration-none"><span class="material-icons align-text-bottom text-white">note_add</span></a></button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>CPF</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            $sql = "SELECT * FROM alunos";
            $query = $con->query($sql) or die($con->error);
            while($row = $query->fetch_assoc()){
                ?>

                <tr>
                    <td><?= $row['nome']?></td>
                    <td><?= $row['sobrenome']?></td>
                    <td><?= $row['cpf']?></td>
                    <td><?= $row['cep']?></td>
                    <td><?= $row['cidade']?></td>
                    <td><?= $row['bairro']?></td>
                    <td><?= $row['rua']?></td>
                    <td><?= $row['numero']?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm updateAlunos" id="<?=$row['idAluno']?>"><span class="material-icons align-text-bottom">edit</span></button>
                        <button type="button" class="btn btn-danger btn-sm deleteAlunos" id="<?=$row['idAluno']?>"><span class="material-icons align-text-bottom">close</span></button>
                    </td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="newAlunosModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="newAlunosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_nome">Nome</label>
                                    <input type="text" class="form-control" name="alunos_nome" id="alunos_nome" style="text-transform: uppercase;">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" name="alunos_sobrenome" id="alunos_sobrenome" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_rg">RG</label>
                                    <input type="text" class="form-control" name="alunos_rg" id="alunos_rg" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_cpf">CPF</label>
                                    <input type="text" class="form-control cpf" name="alunos_cpf" id="alunos_cpf" style="text-transform: uppercase;">
                                </div>
                            </div>
                            









                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="planos_vendas">Planos</label>
                                    <select name="planos_vendas" id="planos_vendas" class="custom-select">
                                        <option value="1">testePlanos</option>
                                        <?php ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="situacao_vendas">Situação</label>
                                    <select name="situacao_vendas" id="situacao_vendas" class="custom-select">
                                        <option value="Ativo">Ativo</option>
                                        <option value="Inativo">Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="data_vendas">Data</label>
                                    <input type="date" class="form-control" name="data_vendas" id="data_vendas">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="formaPagamento_vendas">Forma de Pagamento</label>
                                    <select name="formaPagamento_vendas" id="formaPagamento_vendas" class="custom-select">
                                        <option value="Boleto">Boleto</option>
                                        <option value="Female">Crédito - Á vista</option>
                                        <option value="Female">Débito</option>
                                        <option value="Female">PIX</option>
                                    </select>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                        <button type="submit" class="btn btn-success"><span class="material-icons align-text-bottom">done</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal_edit"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>
<script src="../js/mascaras.js"></script>
<script>


$(document).ready(function(){

    $(".cpf").mask("999.999.999-99");
});

/*
$(document).on('click', '.updateUser', function(){
    var id = $(this).attr('id');

    $("#modal_edit").html('');
    $.ajax({
        url: 'viewSell.php',
        type: 'POST',
        cache: false,
        data: {id:id},
        success:function(data){
            $("#modal_edit").html(data);
            $("#updateUserModal").modal('show');
        }
    })
    

})*/







/*
$(document).on('click', '.deleteSell', function(){
    var id = $(this).attr('id');
    alert(id);

    Swal.fire({
        title: 'Realmente quer fazer isto?',
        text: "O usuário será deletado permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'deleteSell.php',
                type: 'POST',
                data: {id:id},
                success:function(data){
                    Swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: 'Usuário deletado com sucesso!'
                    }).then(()=>{
                        window.location.reload();
                    })
                }

            })
        }
        })
})
*/








// Adicionar um campo, via AJAX SweetAlerts2
    $(document).ready(function(){
        $("#newSellForm").submit(function(e){
            e.preventDefault();

            var alunos_vendas = $("#alunos_vendas").val();
            var planos_vendas = $("#planos_vendas").val();
            var situacao_vendas = $("#situacao_vendas").val();
            var data_vendas = $("#data_vendas").val();
            var formaPagamento_vendas = $("#formaPagamento_vendas").val();

            if(situacao_vendas == '' || data_vendas == '') {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha os campos corretamente!',
                    'error'
                    )
            } else {
                $.ajax({
                    url: 'newSell.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    cache: false,
                    success:function(data){
                        $('#newSellModal').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Usuário adicionado com sucesso!',
                            icon: 'success'
                        }).then(()=>{
                            window.location.reload();
                        })
                        
                    }
                })
            }
        })
    })
    
</script>
</body>
</html>