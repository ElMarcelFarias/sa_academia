<?php

include_once 'conexaoBanco.php';



if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    
    $sql = "SELECT * FROM funcionarios WHERE idFuncionario = '$id'";  
    
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    $nome = $row['nome'];
    $sobrenome = $row['sobrenome'];
    $dataNascimento = $row['dataNascimento'];
    $sexo = $row['sexo'];
    $rg = $row['rg'];
    $cpf = $row['cpf'];
    $cep = $row['cep'];
    $cidade = $row['cidade'];
    $bairro = $row['bairro'];
    $rua = $row['rua'];
    $numero = $row['numero'];
    $estadoCivil = $row['estadoCivil'];
    $salario = $row['salario'];
    $cargaHoraria = $row['cargaHoraria'];
    $nacionalidade = $row['nacionalidade'];
    $descCargo = $row['descCargo'];  
    
}

?>


<div class="modal fade" id="updateFuncionariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modalPlanos" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de Planos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="editFuncionariosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <input type="hidden" value="<?= $id?>" name="funcionarios_id" id="funcionarios_id">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_nome">Nome</label>
                                    <input type="text" class="form-control" name="edit_funcionario_nome" id="edit_funcionario_nome" style="text-transform: uppercase;" value="<?=$nome?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" name="edit_funcionario_sobrenome" id="edit_funcionario_sobrenome" style="text-transform: uppercase;" value="<?=$sobrenome?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_descargo">Descrição do Cargo</label>
                                    <input type="text" class="form-control" name="edit_funcionario_descargo" id="edit_funcionario_descargo" style="text-transform: uppercase;" value="<?=$descCargo?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_cargahoraria">Carga Horária <small class="text-muted">(Semanal)</small></label>
                                    <input type="number" class="form-control" max-lenght="3" name="edit_funcionario_cargahoraria" id="edit_funcionario_cargahoraria" style="text-transform: uppercase;" value="<?=$cargaHoraria?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_salario">Salário</label>
                                    <input type="number" class="form-control" name="edit_funcionario_salario" id="edit_funcionario_salario" style="text-transform: uppercase;" value="<?=$salario?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_rg">RG</label>
                                    <input type="text" class="form-control" name="edit_funcionario_rg" id="edit_funcionario_rg" style="text-transform: uppercase;" value="<?=$rg?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_cpf">CPF</label>
                                    <input type="text" class="form-control cpf" name="edit_funcionario_cpf" id="edit_funcionario_cpf" style="text-transform: uppercase;" value="<?=$cpf?>">
                                </div>
                            </div>
                            


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_cep">CEP</label>
                                    <input type="text" class="form-control" name="edit_funcionario_cep" id="edit_funcionario_cep" onblur="preencherEnderecoEdit(this.value)" style="text-transform: uppercase;" value="<?=$cep?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_cidade">Cidade</label>
                                    <input type="text" class="form-control" name="edit_funcionario_cidade" id="edit_funcionario_cidade" value="<?=$cidade?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_bairro">Bairro</label>
                                    <input type="text" class="form-control" name="edit_funcionario_bairro" id="edit_funcionario_bairro" value="<?=$bairro?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_rua">Rua</label>
                                    <input type="text" class="form-control" name="edit_funcionario_rua" id="edit_funcionario_rua" value="<?=$rua?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_numero">Número</label>
                                    <input type="text" class="form-control" name="edit_funcionario_numero" id="edit_funcionario_numero" maxlength="6" style="text-transform: uppercase;" value="<?=$numero?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_sexo">Sexo</label>
                                    <select name="edit_funcionario_sexo" id="edit_funcionario_sexo" class="custom-select">
                                        <option value="1" <?= $sexo == "1"? "selected": ''?>>Masculino</option>
                                        <option value="2" <?= $sexo == "2"? "selected": ''?>>Feminino</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_nacionalidade">Nacionalidade</label>
                                    <input type="text" class="form-control" name="edit_funcionario_nacionalidade" id="edit_funcionario_nacionalidade" style="text-transform: uppercase;" value="<?=$nacionalidade?>">
                                </div>
                            </div>

                            

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_funcionario_estadocivil">Estado Civil</label>
                                    <select name="edit_funcionario_estadocivil" id="edit_funcionario_estadocivil" class="custom-select">
                                        <option value="1" <?= $estadoCivil == "1"? "selected": ''?>>Casado</option>
                                        <option value="2" <?= $estadoCivil == "2"? "selected": ''?>>Solteiro</option>
                                        <option value="3" <?= $estadoCivil == "3"? "selected": ''?>>Divorciado</option>
                                        <option value="4" <?= $estadoCivil == "4"? "selected": ''?>>Viúvo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="edit_funcionario_data">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="edit_funcionario_data" id="edit_funcionario_data" value="<?=$dataNascimento?>">
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
    var cpf = $('#edit_funcionario_cpf');
    cpf.mask('000.000.000-00', {reverse: false});

    var cep = $('#edit_funcionario_cep');
    cep.mask('00000-000', {reverse: false});
    });

    $(function(){
    //Executa a requisição quando o campo username perder o foco
    $('#edit_funcionario_cpf').blur(function()
    {
        var cpf = $('#edit_funcionario_cpf').val().replace(/[^0-9]/g, '').toString();

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

                $('#edit_funcionario_cpf').val('');
                $('#edit_funcionario_cpf').focus();
            }
        }
        
        });
    });

    function preencherEnderecoEdit(cep){
    $('#edit_funcionario_cidade').val('');
    $('#edit_funcionario_bairro').val('');
    $('#edit_funcionario_rua').val('');

    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
        if (!("erro" in dados)) {       
            $("#edit_funcionario_rua").val(dados.logradouro);
            $("#edit_funcionario_bairro").val(dados.bairro);
            $("#edit_funcionario_cidade").val(dados.localidade);                                
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
        $("#editFuncionariosForm").submit(function(e){
            e.preventDefault();

            var edit_funcionario_nome = $("#edit_funcionario_nome").val();
            var edit_funcionario_sobrenome = $("#edit_funcionario_sobrenome").val();
            var edit_funcionario_descargo = $("#edit_funcionario_descargo").val();
            var edit_funcionario_cargahoraria = $("#edit_funcionario_cargahoraria").val();
            var edit_funcionario_salario = $("#edit_funcionario_salario").val();
            var edit_funcionario_rg = $("#edit_funcionario_rg").val();
            var edit_funcionario_cpf = $("#edit_funcionario_cpf").val();
            var edit_funcionario_cep = $("#edit_funcionario_cep").val();
            var edit_funcionario_cidade = $("#edit_funcionario_cidade").val();
            var edit_funcionario_bairro = $("#edit_funcionario_bairro").val();
            var edit_funcionario_rua = $("#edit_funcionario_rua").val();
            var edit_funcionario_numero = $("#edit_funcionario_numero").val();
            var edit_funcionario_sexo = $("#edit_funcionario_sexo").val();
            var edit_funcionario_nacionalidade = $("#edit_funcionario_nacionalidade").val();
            var edit_funcionario_estadocivil = $("#edit_funcionario_estadocivil").val();
            var edit_funcionario_data = $("#edit_funcionario_data").val();

        

            
         
            if(edit_funcionario_nome == '' || edit_funcionario_sobrenome == '' || edit_funcionario_descargo == ''  || edit_funcionario_cargahoraria == '' || edit_funcionario_salario == ''  || edit_funcionario_rg == '' || edit_funcionario_cpf == '' || edit_funcionario_cep == '' || edit_funcionario_cidade == '' || edit_funcionario_bairro == '' || edit_funcionario_rua == '' || edit_funcionario_numero == '' || edit_funcionario_data == '' || edit_funcionario_nacionalidade == '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, preencha os campos corretamente!',
                    icon: 'warning'
                })
            } else {

                Swal.fire({
                    title: 'Realmente quer fazer isto?',
                    text: "Você irá editar um cadastro de funcionários!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'editFuncionarios.php',
                            type: 'POST',
                            cache: false, 
                            data: $(this).serialize(),
                            success:function(){
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Funcionário editado com sucesso!'
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
