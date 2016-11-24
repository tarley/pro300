<?php
$permissaoPagina = "A"; // A ou P de acordo com o perfil do usuário
require_once ("controleAcesso.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once ("includes/header.php"); ?>
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <?php include_once ("includes/left_col.php"); ?>
    <?php include_once ("includes/top_nav.php"); ?>

    <!-- Page Content Start -->
    <div class="right_col" role="main">
      <div class="">

        <div class="page-title">
          <div class="title_left">
            <h3>Editar Dados Cadastrais</h3>
          </div>
        </div>

	  </div>
	    <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
            
                <div class="x_content">

                  <form id="formEditar" class="form-horizontal form-label-left" method="POST" novalidate>

                    <div id="resultado">
                    <div class="item form-group">
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                          <label>RA*:</label>
                            <input type="text" name="ra" id="ra" class="form-control"  maxlength="8">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                          <label>Nome*:</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                          <label>Telefone:</label>
                          <input type="text" name="telefone" id="telefone" class="form-control" onkeyup="mascara( this, mtel );" maxlength="15">
                          </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                           <label>E-mail*:</label>
                           <input type="text" name="emailCadastro" id="emailCadastro" class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                        <p>* Informações Obrigatórias</p>
                      </div><br/>

                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="submit" id="btnCancelar" class="btn btn-primary">Cancelar</button>
                            <button id="btnEnviar" type="submit" class="btn btn-success">Enviar</button>
                          </div>
                        </div>
                    </div>
                      </div>
				  </form>
                </div>
              </div>
            </div>
          </div>

      </div>

    </div>
      <!-- Page Content End -->
  </div>
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  <?php include("includes/script.php");?>



  <script>
      $.ajax({
        url:'classes/Aluno.class.php?acao=buscarPorId'
      }).done(function(data){
        if (data.erro) {
          alert(data.msg);
          window.location = "login.php";
        } else {
          $('#ra').val(data[0].ra);
          $('#nome').val(data[0].nome);
          $('#telefone').val(data[0].telefone);
          $('#emailCadastro').val(data[0].email);
        }
      });


    $("#btnEnviar").click(function(e){
      var ra = $("#ra").val();
      var nome = $("#nome").val();
      var telefone = $("#telefone").val();
      var emailCadastro = $("#emailCadastro").val();
      
      if (ra == "" || ra.length < 8) {
        alert("Preencha o campo RA com 8 caracteres!");
        e.preventDefault();
        return;
      }

      if (nome == "" || nome.length < 10) {
        alert("Preencha o campo Nome com pelo menos 10 caracteres!");
        e.preventDefault();
        return;
      }

      if (telefone != "" && telefone.length < 15) {
        alert("Preencha o campo Telefone no formato (00)00000-0000");
        e.preventDefault();
        return;
      }

      if (emailCadastro == "") {
        alert("Preencha o campo Email!");
        e.preventDefault();
        return;
      }

      $.post("classes/Aluno.class.php?acao=alterar", { ra: ra, nome: nome, telefone: telefone, emailCadastro: emailCadastro})
          .done(function(result){
            console.log(result);
                alert(result.msg);
			  
		 if (result.erro){
						
		 }else{
		 	window.location = "homeAluno.php";	
		 }
			  
          });

      e.preventDefault();
    });

      $("#btnCancelar").click(function(e){
          window.location = "homeAluno.php";
	       e.preventDefault();
      });


  </script>
  <script src="js/mascaraTelefone.js"></script>

</body>
</html>








