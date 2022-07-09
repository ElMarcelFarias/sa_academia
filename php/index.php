<?php include_once 'conexaoBanco.php';?>

<!DOCTYPE html>
<html lang="pt-br">
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
<body>
    
    <!-- Pre Loader-->
    
    <div class="loader-wrapper">
        <div class="spinner">
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="length" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
        </div>
    </div>
    <!-- Pre Loader-->


    <section class="wrapper">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav class="navbar navbar-dark bg-primary">
              <a class="navbar-brand m-0 py-2 brand-title" href="#">Focus Admin</a>
              <span></span>
              <a class="navbar-brand py-2 material-icons toggle-sidebar" href="#">menu</a>
            </nav>

            <nav class="navigation">
              <ul>
                  <li class="active"><a href="index.html" data-toggle="modal" data-target="#newSellModal" title="Adicionar nova Venda"><span class="nav-icon material-icons">add</span> Cadastro</a></li>
                  
                  <li class="active" title="Cadastro de Alunos"><a><span class="nav-icon material-icons ">sell</span> Vendas </a>
                  </li>
                  <li title="Cadastro de Alunos"><a href="newCadAlunos.php"><span class="nav-icon material-icons ">fitness_center</span> Aluno </a>
                  </li>
                  <li title="Cadastro de Funcionários"><a href="newCadFuncionarios.php"><span class="nav-icon material-icons ">badge</span> Funcionário </a>
                  </li>
                  <li title="Cadastro de Planos"><a href="newCadPlanos.php"><span class="nav-icon material-icons ">note_add</span> Planos </a>
                  </li>
                  
              </ul>
                  <!--<li class="notification alert-notify"><a href="#"><span class="nav-icon material-icons">question_answer</span> Forms <span class="toogle-sub-nav material-icons">keyboard_arrow_right</span></a></li>-->
              </ul>

              <label title="Documentação"><span>Ajuda para Usuários<span></label>
              <ul>
                  <li><a href="https://github.com/ElMarcelFarias/sa_academia" title="Documentação" target="_blank"><span class="nav-icon material-icons">school</span> Documentação</a></li>
                  <li><form action="gerarPDF.php"><button type="" class="btn text-center" style="background-color: transparent; color: #6c757d;"><span class="ml-1 mr-2 nav-icon material-icons">picture_as_pdf</span>Gerar PDF</button></form></li>
                  
              </ul>
            </nav>

          </aside>

        <div class="content-area">
          <div class="content-wrapper">

            <div class="row page-tilte align-items-center">
              <div class="col-md-auto">
                <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
                <h1 class="weight-300 h3 title"><span class="nav-icon material-icons ">sell</span> Vendas </h1>
              </div> 
              <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
                <div class="controls d-flex justify-content-center justify-content-md-end">
                  
                </div>
              </div>
            </div> 


                  
            <div class="content">
                
                <table id="example" class="table table-striped mb-4 bg-white table-bordered">
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

                    $sql = "SELECT a.nome as nomeAluno, a.sobrenome as sobrenomeAluno, p.nome as nomePlano, v.* FROM alunos as a inner join vendas as v on a.idAluno = v.alunos_idAluno
                    inner join planos as p on p.idPlano = v.planos_idPlano";
                    $query = $con->query($sql) or die($con->error);

                    while($row = $query->fetch_assoc()){
                        ?>
        
                        <tr>
                            <td><?= strtoupper($row['nomeAluno'].' '.$row['sobrenomeAluno'])?></td>
                            <td><?= strtoupper($row['nomePlano'])?></td>
                            <td><?= $row['situacao']?></td>
                            <td><?= date('d/m/Y', strtotime($row['data'])) ?></td>
                            <td><?= $row['formaPagamento']?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm deleteSell" id="<?=$row['idVenda']?>"><span class="material-icons align-text-bottom">delete</span></button>
                            </td>
                        </tr>
                        <?php
                    }

                ?>
                    
                </tbody>
                    
            </table>

          </div>
            <footer class="footer">
              <p class="text-muted m-0"><small class="float-right">Feito por <span class="material-icons md-16 text-danger align-middle">favorite</span> by Marcel Farias - Otávio Henrique</small><small >FocusBody © 2022–2022 </small></p>
            </footer>

          </div>
        </div>
    </section>

    
    <div class="modal fade" id="newSellModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de Vendas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="newSellForm" method="POST">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="alunos_vendas">Alunos</label>
                                        <select name="alunos_vendas" id="alunos_vendas" class="custom-select">
                                            <?php 
                                            
                                            $sqlAlunos = "SELECT * FROM alunos";
                                            $query = $con->query($sqlAlunos) or die($con->error);
                                            $alunosArray = array();

                                            while($a = mysqli_fetch_assoc($query)) {
                                                array_push($alunosArray, $a);
                                            }

                                            foreach($alunosArray as $alunos) {
                                                echo "<option value='".$alunos['idAluno']."'>".strtoupper($alunos['nome'].' '.$alunos['sobrenome'])."</option>";
                                            }
                                            
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="planos_vendas">Planos</label>
                                        <select name="planos_vendas" id="planos_vendas" class="custom-select">
                                            <?php 
                                            
                                            $sqlPlanos = "SELECT * FROM planos";
                                            $query = $con->query($sqlPlanos) or die($con->error);
                                            $planosArray = array();

                                            while($a = mysqli_fetch_assoc($query)) {
                                                array_push($planosArray, $a);
                                            }

                                            foreach($planosArray as $planos) {
                                                echo "<option value='".$planos['idPlano']."'>".strtoupper($planos['nome'].' - '.$planos['duracao']. ' -  R$'. $planos['preco'])."</option>";
                                            }
                                            
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="situacao_vendas">Situação</label>
                                        <select name="situacao_vendas" id="situacao_vendas" class="custom-select">
                                            <option value="Ativo">Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="data_vendas">Data de Inicio</label>
                                        <input type="date" class="form-control" name="data_vendas" id="data_vendas">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="formaPagamento_vendas">Forma de Pagamento</label>
                                        <select name="formaPagamento_vendas" id="formaPagamento_vendas" class="custom-select">
                                            <option value="BOLETO">Boleto</option>
                                            <option value="CREDITO">Crédito - Á vista</option>
                                            <option value="DEBITO">Débito</option>
                                            <option value="PIX">PIX</option>
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

    <script src="../assets/js/lib/moment.min.js"></script>
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/js/jquery.dataTables.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/js/dataTables.bootstrap4.js"></script>
    <script src="../assets/js/lib/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/js/chosen-js/chosen.jquery.js"></script>
    <script src="../assets/js/custom.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>

<script>
//DataTables script 
$(document).ready(function() {
    $('#example').DataTable({
        language: {
            lengthMenu: 'Páginas disponiveis _MENU_ ',
            zeroRecords: 'Nada encontrado, desculpe!',
            info: 'Página _PAGE_ de _PAGES_',
            infoEmpty: 'Não há registros disponíveis',
            infoFiltered: '(filtrando de _MAX_ total regristros)',
            search: 'Pesquisar',
                "paginate": {
                "first":      "Primeira",
                "last":       "Last",
                "next":       "Próxima",
                "previous":   "Anterior"
            },
        },
    });
    
} );


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

    Swal.fire({
        title: 'Realmente quer fazer isto?',
        text: "O usuário será deletado permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
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