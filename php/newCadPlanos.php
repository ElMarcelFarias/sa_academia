<?php include_once 'conexaoBanco.php';?>

<?php
    session_start();
    if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 1) {

?>

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
    <script src="../assets/css/dataTables.responsive.css"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/css/dataTables.bootstrap4.css"></script>
    


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
              <a class="navbar-brand m-0 py-2 brand-title" href="index.php">Focus Admin</a>
              <span></span>
              <a class="navbar-brand py-2 material-icons toggle-sidebar" href="#">menu</a>
            </nav>

            <nav class="navigation">
              <ul>
                  <li class="active"><a href="index.html" data-toggle="modal" data-target="#newPlanosModal" title="Adicionar novo Plano"><span class="nav-icon material-icons">add</span> Cadastro</a></li>
                  <li class="active" title="Cadastro de Planos"><a><span class="nav-icon material-icons ">note_add</span> Planos </a>
                  </li>
                  <li title="Cadastro de Alunos"><a href="index.php"><span class="nav-icon material-icons ">sell</span> Vendas </a>
                  </li>
                  <li title="Cadastro de Funcionários"><a href="newCadFuncionarios.php"><span class="nav-icon material-icons ">badge</span> Funcionário </a>
                  </li>
                  <li title="Cadastro de Planos"><a href="newCadAlunos.php"><span class="nav-icon material-icons ">fitness_center</span> Aluno </a>
                  </li>
                  
              </ul>
                  <!--<li class="notification alert-notify"><a href="#"><span class="nav-icon material-icons">question_answer</span> Forms <span class="toogle-sub-nav material-icons">keyboard_arrow_right</span></a></li>-->
              </ul>

              <label title="Documentação"><span>Ajuda para Usuários<span></label>
              <ul>
                  <li><a href="https://github.com/ElMarcelFarias/sa_academia" title="Documentação" target="_blank"><span class="nav-icon material-icons">school</span> Documentação</a></li>
                  <li><form action="gerarPDFPlanos.php"><button type="" class="btn text-center" style="background-color: transparent; color: #6c757d;"><span class="ml-1 mr-2 nav-icon material-icons">picture_as_pdf</span>Gerar PDF</button></form></li>
                  <li><a href="efetuarLogout.php"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Logout
                      </a>
                  </li>
              </ul>
            </nav>

          </aside>

        <div class="content-area">
          <div class="content-wrapper">

            <div class="row page-tilte align-items-center">
              <div class="col-md-auto">
                <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
                <h1 class="weight-300 h3 title"><span class="nav-icon material-icons ">note_add</span> Planos</h1>
              </div> 
              <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
                <div class="controls d-flex justify-content-center justify-content-md-end px-2">
                  
                </div>
              </div>
            </div> 


                  
            <div class="content">
                
                <table id="example" class="table table-striped mb-4 bg-white table-bordered ">
                    <thead>
                        <tr>
                            <th style="width:50%">Nome</th>
                            <th style="width:20%">Preço</th>
                            <th style="width:20%">Duração</th>
                            <th style="width:10%">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "SELECT * FROM planos";
                        $query = $con->query($sql) or die($con->error);

                        while($row = $query->fetch_assoc()){
                            ?>
            
                            <tr>
                                <td><?= strtoupper($row['nome'])?></td>
                                <td><?= 'R$'.$row['preco']?></td>
                                <td><?= strtoupper($row['duracao'])?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm updatePlanos" id="<?=$row['idPlano']?>"><span class="material-icons align-text-bottom">edit</span></button>
                                    <button type="button" class="btn btn-danger btn-sm deletePlanos" id="<?=$row['idPlano']?>"><span class="material-icons align-text-bottom">close</span></button>
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


    <div class="modal fade" id="newPlanosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modalPlanos" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de Planos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="newPlanosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="planos_nome">Nome do Plano</label>
                                    <input type="text" class="form-control" name="planos_nome" id="planos_nome" style="text-transform: uppercase;">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="planos_preco">Preço</label>
                                    <input type="text" class="form-control" name="planos_preco" id="planos_preco" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="planos_duracao">Duração <small class="text-muted">(Mensal, Semestral, Anual)</small></label>
                                    <input type="text" class="form-control" name="planos_duracao" id="planos_duracao" style="text-transform: uppercase;">
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
    <script src="../assets/js/dataTables.responsive.js"></script>
    <script src="../assets/js/lib/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/js/chosen-js/chosen.jquery.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <script src="../js/jquery.mask.min.js"></script>



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

$(document).ready(function () { 
    var num = $('#planos_preco');
    num.mask('000,00', {reverse: false});

});



$(document).on('click', '.updatePlanos', function(){
    var id = $(this).attr('id');
    
    $("#modal_edit").html('');
    $.ajax({
        url: 'viewPlanos.php',
        type: 'POST',
        cache: false,
        data: {id:id},
        success:function(data){
            $("#modal_edit").html(data);
            $("#updatePlanosModal").modal('show');
        }
    })
    

})

// Deletar um cadastro 
$(document).on('click', '.deletePlanos', function(){
    var id = $(this).attr('id');
    
    
    Swal.fire({
        title: 'Realmente quer fazer isto?',
        text: "O plano será deletado permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'deletePlanos.php',
                type: 'POST',
                data: {id:id},
                success:function(data){
                    if(data == 'true'){
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: 'Plano deletado com sucesso!'
                        }).then(()=>{
                            window.location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Erro',
                            'Não é possível excluir um plano associado a vendas!.',
                            'error'
                        )
                    }
                }

            })
        }
        })
})




// Adicionar um campo, via AJAX SweetAlerts2
    $(document).ready(function(){
        $("#newPlanosForm").submit(function(e){
            e.preventDefault();

            var planos_nome = $("#planos_nome").val(); 
            var planos_preco = $("#planos_preco").val();
            var planos_duracao = $("#planos_duracao").val();


            
            if(planos_nome == '' || planos_preco == '' || planos_duracao == '') {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha os campos corretamente!',
                    'error'
                    )
            } else {
                $.ajax({
                    url: 'newPlanos.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    cache: false,
                    success:function(data){
                        $('#newPlanosModal').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Plano adicionado com sucesso!',
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
<?php
    } else {
        header("Location: index.php?return=false");
    }
?>
</body>
</html>