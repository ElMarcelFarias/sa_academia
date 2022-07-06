<?php

include_once 'conexaoBanco.php';



if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM planos WHERE idPlano = '$id'";  
    
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    $nome = $row['nome'];
    $preco = $row['preco'];
    $duracao = $row['duracao'];
    
}

?>

<div class="modal fade" id="updatePlanosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modalPlanos" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de Planos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="editPlanosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <input type="hidden" value="<?= $id?>" name="planos_id" id="planos_id">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_planos_nome">Nome do Plano</label>
                                    <input type="text" class="form-control" name="edit_planos_nome" id="edit_planos_nome" style="text-transform: uppercase;" value="<?=$nome?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_planos_preco">Preço</label>
                                    <input type="text" class="form-control" name="edit_planos_preco" id="edit_planos_preco" style="text-transform: uppercase;" value="<?=$preco?>">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="edit_planos_duracao">Duração <small class="text-muted">(Mensal, Semestral, Anual)</small></label>
                                    <input type="text" class="form-control" name="edit_planos_duracao" id="edit_planos_duracao" style="text-transform: uppercase;" value="<?=$duracao?>">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                        <button type="submit" class="btn btn-success"><span class="material-icons align-text-bottom">done</span></button>
                    </div>

                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>






<script>

    //máscaras de preço
    $(document).ready(function () { 
        var num = $('#edit_planos_preco');
        num.mask('000,00', {reverse: false});
    });


    


    $(document).ready(function(){
        $("#editPlanosForm").submit(function(e){
            e.preventDefault();

            var nome = $("#edit_planos_nome").val();
            var preco = $("#edit_planos_preco").val();
            var duracao = $("#edit_planos_duracao").val();
         
            if(nome == '' || preco == '' || duracao == '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, preencha os campos corretamente!',
                    icon: 'warning'
                })
            } else {

                Swal.fire({
                    title: 'Realmente quer fazer isto?',
                    text: "Você irá editar um registro de plano!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'editPlanos.php',
                            type: 'POST',
                            cache: false, 
                            data: $(this).serialize(),
                            success:function(){
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Plano editado com sucesso!'
                                }).then(()=>{
                                    window.location.reload();
                                })
                            }
                        })
                    }
                })

                
            }

        })
    })
</script>