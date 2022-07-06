<?php

include_once 'conexaoBanco.php';

if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM alunos WHERE idAluno = '$id'";
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    
    $nome = $row['nome'];
    $sobrenome = $row['sobrenome'];
    $rg = $row['rg'];
    $cpf = $row['cpf'];
    $cep = $row['cep'];
    $cidade = $row['cidade'];
    $bairro = $row['bairro'];
    $rua = $row['rua'];
    $numero = $row['numero'];
    $sexo = $row['sexo'];
    $dataNascimento = $row['dataNascimento'];
}
?>

<div class="modal fade" id="updateAlunosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modalAlunos" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de Alunos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="editAlunosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <input type="hidden" value="<?= $id?>" name="alunos_id" id="alunos_id">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_name">Nome</label>
                                    <input type="text" class="form-control" name="edit_alunos_name" id="edit_alunos_name" style="text-transform: uppercase;" value="<?=$nome?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" name="edit_alunos_sobrenome" id="edit_alunos_sobrenome" style="text-transform: uppercase;" value="<?=$sobrenome?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_rg">RG</label>
                                    <input type="text" class="form-control" name="edit_alunos_rg" id="edit_alunos_rg" style="text-transform: uppercase;" value="<?=$rg?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_cpf">CPF</label>
                                    <input type="text" class="form-control" name="edit_alunos_cpf" id="edit_alunos_cpf" value="<?=$cpf?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_cep">CEP</label>
                                    <input type="text" class="form-control" name="edit_alunos_cep" id="edit_alunos_cep" onblur="preencherEnderecoEditAlunos(this.value)" value="<?=$cep?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_cidade">Cidade</label>
                                    <input type="text" class="form-control" name="edit_alunos_cidade" id="edit_alunos_cidade" value="<?=$cidade?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_bairro">Bairro</label>
                                    <input type="text" class="form-control" name="edit_alunos_bairro" id="edit_alunos_bairro" value="<?=$bairro?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_rua">Rua</label>
                                    <input type="text" class="form-control" name="edit_alunos_rua" id="edit_alunos_rua" value="<?=$rua?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_numero">Numero</label>
                                    <input type="text" class="form-control" name="edit_alunos_numero" id="edit_alunos_numero" value="<?=$numero?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_alunos_sexo">Sexo</label>
                                    <select name="edit_alunos_sexo" id="edit_alunos_sexo" class="custom-select">
                                        <option value="1" <?= $sexo == "1"? "selected": ''?>>Masculino</option>
                                        <option value="2" <?= $sexo == "2"? "selected": ''?>>Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="edit_alunos_dataNascimento">dataNascimento</label>
                                    <input type="date" class="form-control" name="edit_alunos_dataNascimento" id="edit_alunos_dataNascimento" value="<?=$dataNascimento?>">
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

    //máscaras de cpf e cep
    $(document).ready(function () { 
        var cpf = $('#edit_alunos_cpf');
        cpf.mask('000.000.000-00', {reverse: false});

        var cep = $('#edit_alunos_cep');
        cep.mask('00000-000', {reverse: false});
    });


    //validação cpf
    $(function(){
    //Executa a requisição quando o campo username perder o foco
    $('#edit_alunos_cpf').blur(function()
        {
            var cpf = $('#edit_alunos_cpf').val().replace(/[^0-9]/g, '').toString();

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

                    $('#edit_alunos_cpf').val('');
                    $('#edit_alunos_cpf').focus();
                }
            }
            
        });
    });

    //API VIA CEP 
    function preencherEnderecoEditAlunos(cep){
        $('#edit_alunos_cidade').val('');
        $('#edit_alunos_bairro').val('');
        $('#edit_alunos_rua').val('');

        $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {       
                $("#edit_alunos_rua").val(dados.logradouro);
                $("#edit_alunos_bairro").val(dados.bairro);
                $("#edit_alunos_cidade").val(dados.localidade);                                
            }else {                        
                Swal.fire(
                        'Erro',
                        'CEP não encontrado! Preencha o endereço manualmente.',
                        'error'
                        )
            }
        });
    }



    $(document).ready(function(){
        $("#editAlunosForm").submit(function(e){
            e.preventDefault();

            var nome = $("#edit_alunos_name").val();
            var sobrenome = $("#edit_alunos_sobrenome").val();
            var rg = $("#edit_alunos_rg").val();
            var cpf = $("#edit_alunos_cpf").val();
            var cep = $("#edit_alunos_cep").val();
            var cidade = $("#edit_alunos_cidade").val();
            var bairro = $("#edit_alunos_bairro").val();
            var rua = $("#edit_alunos_rua").val();
            var numero = $("#edit_alunos_numero").val();
            var sexo = $("#edit_alunos_sexo").val();
            var dataNasc = $("#edit_alunos_dataNascimento").val();

            
            if(nome == '' || sobrenome == '' || rg == '' || cpf == '' || cep == '' || cidade == '' || bairro == '' || rua == '' || numero == '' || dataNasc == '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, preencha os campos corretamente!',
                    icon: 'warning'
                })
            } else {

                Swal.fire({
                    title: 'Realmente quer fazer isto?',
                    text: "Você irá editar um registro de aluno!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'editAlunos.php',
                            type: 'POST',
                            cache: false, 
                            data: $(this).serialize(),
                            success:function(){
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Aluno editado com sucesso!'
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