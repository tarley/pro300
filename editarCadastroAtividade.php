<?php
$permissaoPagina = "P"; // A ou P de acordo com o perfil do usuário
require_once("controleAcesso.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("includes/header.php"); ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include_once("includes/left_col.php"); ?>
        <?php include_once("includes/top_nav.php"); ?>

        <!-- Page Content Start -->
        <div class="right_col" role="main">
            <div class="">

                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar Atividade</h3><!-- Título da Página -->
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_panel">
                            <div class="x_content">

                                <!-- Início do conteudo da página  -->

                                <!-- alteração -->
                                <form id="formEditar" class="form-horizontal form-label-left" method="POST" novalidate>
                                    <div>
                                        <div class="item form-group">
                                            <div class="form-group" method="get">
                                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                                                    <label class="control-label">Token*: </label>
                                                    <input type="text" name="token" class="form-control" id="token" maxlength="56">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                                                    <label class="control-label">Período de
                                                        inscrição da Prova300*:
                                                    </label>

                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                            <span class="add-on input-group-addon"><i
                                                                    class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                                <input type="text" style="width: 200px"
                                                                       name="reservation"
                                                                       id="reservation" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                                                    <label class="control-label">Descrição da prova*:</label>
                                                    <textarea class="form-control" rows="4" name="descricao"
                                                              id="descricao"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                                                <p>* Informações Obrigatórias</p>
                                            </div>
                                            <br/>
                                            <div class="ln_solid"></div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12"
                                                     style="margin-top:9px">
                                                    <input type="submit" class="btn btn-primary" name="cancelar"
                                                           id="cancelar" value="Cancelar">
                                                    <input type="submit" class="btn btn-success" name="confirmar"
                                                           id="confirmar" value="Confirmar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                                <!-- Fim do conteudo da página  -->
                            </div>
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
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<?php include_once("includes/script.php"); ?>

<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script>

    var codAtividade = <?php echo $_GET['codAtividade'] ?>;
    var dataInicioAtividadeOriginal = null;

    $.ajax({
        url: 'classes/Atividade.class.php?acao=mostrar&cod_atividade=' + codAtividade
    }).done(function (data) {
        if (data.erro) {
            alert(data.msg);
            window.location = "login.php";
        } else {
            $('#token').val(data[0].token);
            $('#descricao').val(data[0].desc_atividade);
            console.log(data[0].data_inicio + ' - ' + data[0].data_fim);
            $('#reservation').data('daterangepicker').setStartDate(data[0].data_inicio);
            $('#reservation').data('daterangepicker').setEndDate(data[0].data_fim);

            dataInicioAtividadeOriginal = data[0].data_inicio_original;
        }

    });

    $("#confirmar").click(function (e) {

        var token = $("#token").val();
        var descricao = $("#descricao").val();
        var dataInicio = $('#reservation').data('daterangepicker').startDate.format('YYYY-MM-DD');
        var dataFim = $('#reservation').data('daterangepicker').endDate.format('YYYY-MM-DD');

        if (token == "") {
            alert("Preencha o campo Token!");
            e.preventDefault();
            return;
        }

        var dtInicio = moment(dataInicio);
        dataInicioAtividadeOriginal = moment(dataInicioAtividadeOriginal, 'YYYY-MM-DD');
        console.log(dtInicio);
        console.log(dataInicioAtividadeOriginal);

        if (dataInicioAtividadeOriginal.isAfter(dtInicio, 'day')) {
            alert("A data não deve ser anterior a data original!");
            e.preventDefault();
            return;
        }

        if (descricao == "") {
            alert("Preencha o campo de Descrição!");
            e.preventDefault();
            return;
        }

        $.post("classes/Atividade.class.php?acao=alterar", {
            token: token,
            descricao: descricao,
            dataInicio: dataInicio,
            dataFim: dataFim,
            cod_atividade: codAtividade
        })
            .done(function (result) {
                console.log(result);
                alert(result.msg);

                if (result.erro == false) {
                    //console.log("sim");
                    window.location = "administrarAtividades.php";
                }
                if (result.erro == true) {
                    window.location = "administrarAtividades.php";
                }
            })
            .error(function (result) {
                alert('Erro: ' + result.msg);
            });

        e.preventDefault();
    });

    $("#cancelar").click(function (e) {
        window.location = "administrarAtividades.php";
        e.preventDefault();
    });
</script>

</body>
</html>
