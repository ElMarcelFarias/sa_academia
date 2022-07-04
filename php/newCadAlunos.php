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
    <link rel="stylesheet" href="../assets/indexPhp.css">
    <title>Focus Body | ADM</title>
</head>
<body>
    
    <div class="cabecalho container-fluid bg-info py-2 text-center">
        <h2 style="color: #FFF;">Alunos</h2>
    </div>


    <div class="container mt-5">
        <button type="button" class="botaoAcao btn btn-info mb-3 m-1" data-toggle="modal" data-target="#newAlunosModal"><span class="material-icons align-text-bottom">add</span></button>
        <a href="index.php" class="text-decoration-none"><button type="button" class="botaoAcao btn btn-info mb-3 m-1"><span class="material-icons align-text-bottom text-white">sell</span></button></a>
        <a href="../index.html" class="text-decoration-none"><button type="button" class="botaoAcao btn btn-info mb-3 m-1"><span class="material-icons align-text-bottom text-white">badge</span></button></a>
        <a href="../index.html" class="text-decoration-none"><button type="button" class="botaoAcao btn btn-info mb-3 m-1"><span class="material-icons align-text-bottom text-white">note_add</span></button></a>
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
        <div class="modal-dialog modal-dialog-centered modalAlunos">
            <div class="modal-content">
                <form id="newAlunosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_nome">Nome</label>
                                    <input type="text" class="form-control" name="alunos_nome" id="alunos_nome" style="text-transform: uppercase;">
                                </div>
                            </div>


                            <div class="col-sm-6">
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
                                    <label for="alunos_cep">CEP</label>
                                    <input type="text" class="form-control" name="alunos_cep" id="alunos_cep" onblur="preencherEndereco(this.value)" style="text-transform: uppercase;">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_cidade">Cidade</label>
                                    <input type="text" class="form-control" name="alunos_cidade" id="alunos_cidade">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_bairro">Bairro</label>
                                    <input type="text" class="form-control" name="alunos_bairro" id="alunos_bairro">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_rua">Rua</label>
                                    <input type="text" class="form-control" name="alunos_rua" id="alunos_rua">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_numero">Número</label>
                                    <input type="text" class="form-control" name="alunos_numero" id="alunos_numero" maxlength="6" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_sexo">Sexo</label>
                                    <select name="alunos_sexo" id="alunos_sexo" class="custom-select">
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_data">Data</label>
                                    <input type="date" class="form-control" name="alunos_data" id="alunos_data">
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
<script src="../js/jquery.mask.js"></script>
<script src="../js/jquery.mask.min.js"></script>

<script>


$(document).ready(function () { 
    var cpf = $('#alunos_cpf');
    cpf.mask('000.000.000-00', {reverse: false});

    var cep = $('#alunos_cep');
    cep.mask('00000-000', {reverse: false});
});



$(function(){
    //Executa a requisição quando o campo username perder o foco
    $('#alunos_cpf').blur(function()
    {
        var cpf = $('#alunos_cpf').val().replace(/[^0-9]/g, '').toString();

        if( cpf.length == 11 )
        {
            var v = [];

            //Calcula o primeiro dígito de verificação.
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            //Calcula o segundo dígito de verificação.
            v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
            v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
            v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            //Retorna Verdadeiro se os dígitos de verificação são os esperados.
            if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
            {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha um CPF válido!',
                    'error'
                    )

                $('#alunos_cpf').val('');
                $('#alunos_cpf').focus();
            }
        }
        
    });
});

//API VIA CEP 

function preencherEndereco(cep){
    $('#alunos_cidade').val('');
    $('#alunos_bairro').val('');
    $('#alunos_rua').val('');

    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
        if (!("erro" in dados)) {       
            $("#alunos_rua").val(dados.logradouro);
            $("#alunos_bairro").val(dados.bairro);
            $("#alunos_cidade").val(dados.localidade);                                
        }else {                        
            Swal.fire(
                    'Erro',
                    'CEP não encontrado! Preencha o endereço manualmente.',
                    'error'
                    )
        }
     });
}



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
        $("#newAlunosForm").submit(function(e){
            e.preventDefault();

            var alunos_nome = $("#alunos_nome").val(); 
            var alunos_sobrenome = $("#alunos_sobrenome").val();
            var alunos_rg = $("#alunos_rg").val();
            var alunos_cpf = $("#alunos_cpf").val();
            var alunos_cep = $("#alunos_cep").val();
            var alunos_cidade = $("#alunos_cidade").val();
            var alunos_bairro = $("#alunos_bairro").val();
            var alunos_rua = $("#alunos_rua").val();
            var alunos_numero = $("#alunos_numero").val();
            var alunos_sexo = $("#alunos_sexo").val();
            var alunos_data = $("#alunos_data").val();

          

            
            if(alunos_nome == '' || alunos_sobrenome == '' || alunos_rg == '' || alunos_cpf == '' || alunos_cep == '' || alunos_cidade == '' || alunos_bairro == '' || alunos_rua == '' || alunos_numero == '' || alunos_data == '') {
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