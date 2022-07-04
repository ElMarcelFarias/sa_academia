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
        <h2 style="color: #FFF;">Vendas</h2>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <button type="button" class="botaoAcao btn btn-info mb-3 m-1" data-toggle="modal" data-target="#newSellModal"><span class="material-icons align-text-bottom">add</span></button>
                <a href="newCadAlunos.php" class="text-decoration-none"><button type="button" class="botaoAcao btn btn-info mb-3 m-1"><span class="material-icons align-text-bottom text-white">fitness_center</span></button></a>
                <a href="../index.html" class="text-decoration-none"><button type="button" class="botaoAcao btn btn-info mb-3 m-1"><span class="material-icons align-text-bottom text-white">badge</span></button></a>
                <a href="../index.html" class="text-decoration-none"><button type="button" class="botaoAcao btn btn-info mb-3 m-1"><span class="material-icons align-text-bottom text-white">note_add</span></button></a>
            </div>

            <div class="form-inline col-6 col-md-4 justify-content-end">
                <form action="#" method="GET">
                    <div class="form-group">			
                        <div class="input-group mb-3">
                            <input type="text" id="textoPesquisa" class="form-control" placeholder="Pesquise..." name="pesquisa" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                            <button type="submit" class="botaoAcao btn" id="button-addon2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>	
                            </div>
                        </div>
                                
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Plano</th>
                    <th>Situação</th>
                    <th>Data</th>
                    <th>Forma de pagamento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            $sql = "SELECT a.nome as nomeAluno, p.nome as nomePlano, v.* FROM alunos as a inner join vendas as v on a.idAluno = v.alunos_idAluno
            inner join planos as p on p.idPlano = v.planos_idPlano";
            $query = $con->query($sql) or die($con->error);

            if(isset($_GET['pesquisa']) && $_GET['pesquisa']!=""){
				$pesquisa=$_GET['pesquisa'];
				$sql = $sql. " WHERE a.nome LIKE '".$pesquisa."%'";
			}
            $resultado=mysqli_query($con,$sql);
			$pessoasRetornadas=array();
			$linhas=mysqli_num_rows($resultado);
			if($linhas==0){
				echo"<tr><td colspan='6'>Nenhuma pessoa foi encontrada!</td></tr>";
			}else{
				while($p = mysqli_fetch_assoc($resultado)){
					array_push($pessoasRetornadas, $p);
				}
				foreach($pessoasRetornadas as $p){
					echo "<tr>";
					echo "<td>".$p['nomeAluno']."</td>";
					echo "<td>".$p['nomePlano']."</td>";
					echo "<td>".$p['situacao']."</td>";
					echo "<td>".$p['data']."</td>";
					echo "<td>".$p['formaPagamento']."</td>";
                    ?>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm deleteSell" id="<?php echo $p['idVenda'];?>"><span class="material-icons align-text-bottom">close</span></button>
                    </td>
                    <?php
                }
            }
        ?>

            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="modal fade" id="newSellModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="newSellForm" method="POST">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="alunos_vendas">Alunos</label>
                                        <select name="alunos_vendas" id="alunos_vendas" class="custom-select">
                                            <option value="2">testeAlunos</option>
                                            <?php ?>
                                        </select>
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
    </div>

    <div id="modal_edit"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>

<script>


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
    

})






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
                            text: 'Venda cadastrada com sucesso!',
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