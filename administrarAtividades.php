<?php $permissaoPagina = "P"; require_once ("controleAcesso.php");?>
<!DOCTYPE html><html lang="en">
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
                <h3>Atividades</h3>
              </div>
            </div>
            <div class="clearfix">
              <a href="cadastroAvaliacao.php" style="float:right" type="button" class="btn btn-default">Criar nova atividade</a>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table id="ListarAtividades" class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th style="width:40%" class="column-title">Nome das Atividades</th>
                          <th class="column-title">Ações</th>
                        </th>
                      </tr>
                    </thead>
                  <tbody>
                  </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>   
    </div>
    <!-- Page Content End -->
    </div>
  </div> 
<div id="custom_notifications" class="custom-notifications dsp_none">
  <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">  </ul>
  <div class="clearfix"></div>
  <div id="notif-group" class="tabbed_notifications"></div>
</div>
<?php include_once ("includes/script.php"); ?>
<script src="js/listaAtividadePorProfessor.js"></script>
<script>   
  var atv = new atividade();
  var tabela = $('#ListarAtividades');
  var tbody = tabela.find('tbody');
  atv.listarAtividades(tbody);
  $(document).ready(function() { 
    if(confirm("Você deseja encerrar esta atividade?")) {
      $(document).on("click", "#btnEncerrarAtividade", function(e){
        var cod_atividade = $(this).parent().parent().attr("id");
        console.log(cod_atividade);
        $.post("classes/Atividade.class.php?acao=encerrar", {cod_atividade: cod_atividade }).done(function(result){
          alert(result.msg);
          if(result.erro == false){
            atv.listarAtividades(tbody);
          }
        });
        e.preventDefault();
      });
    }
  });
</script>
</body>
</html>
