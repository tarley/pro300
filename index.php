<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link rel="stylesheet" href="/plugins/materialize/css/materialize.min.css">

    <!-- DataTable-->
    <link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
    <link type="text/css" rel="stylesheet" href="/plugins/dataTables/media/css/jquery.dataTables.css">
    <link type="text/css" rel="stylesheet" href="/plugins/dataTables/extensions/Buttons/css/buttons.dataTables.min.css">

    <!-- CSS da aplicação -->
    <link type="text/css" rel="stylesheet" href="/app/assets/css/app-v2.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
</head>

<body ng-app="pro300App">

    <ul id="slide-out" class="side-nav" ng-controller="MenuController" ng-init="init()">
        <li>
            <div class="user-view">
                <!--<div class="background">-->
                <!--    <img src="/app/assets/img/logo-newton.png">-->
                <!--</div>-->
                <!--<a href="#!user"><img class="circle" src="/app/assets/img/logo-newton.png"></a>-->
                <a href="#!user"><img src="/app/assets/img/logo-newton.png"></a>
                <a href="#!name"><span class="name">{{usuario.nome}}</span></a>
                <a href="#!email"><span class="email">{{usuario.email}}</span></a>
                <!--<a href="#!perfil"><span>{{usuario.perfil}}</span></a>-->
            </div>
        </li>
        <li ng-repeat="item in itensMenu">
            <a href="{{item.url}}">
                <i class="material-icons">chevron_right</i>{{item.descricao}}
            </a>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Mais opções</a></li>
        <li>
            <a class="waves-effect" ng-click="fundadores" href="#!/fundadores">
                <i class="material-icons left">sentiment_very_satisfied</i>Fundadores do sistema
            </a>
        </li>
        <li>
            <a class="waves-effect" ng-click="logout()">
                <i class="material-icons left">close</i>Sair do sistema
            </a>
        </li>
    </ul>

    <nav>
        <div class="nav-wrapper blue darken-4">
            <a id="button-menu" class="btn-floating btn-large waves-effect waves-light blue darken-4" data-activates="slide-out">
                <i class="material-icons">menu</i>
            </a>
            <label class="brand-logo center" href="#!/" style="margin: 0 0 0 10px">Projeto 300</label>
        </div>
    </nav>

    <main>
        <div class="section">
            <ng-view></ng-view>
        </div>
    </main>

    <footer class="blue darken-4">
        <a class="white-text text-lighten-3" href="https://www.newtonpaiva.br/graduacao/sistemas-de-informacao">
            Aplicativo desenvolvido pelos alunos do curso de Sistemas de Informação - Newton Paiva.
        </a>
    </footer>

    <!--jQuery -->
    <script type="text/javascript" src="/plugins/jquery/jquery.js"></script>

    <!--DataTables-->
    <script type="text/javascript" src="/plugins/dataTables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/plugins/dataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/plugins/dataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="/plugins/jszip/js/jszip.min.js"></script>
    <script type="text/javascript" src="/plugins/pdfmake/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/plugins/pdfmake/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/plugins/dataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/plugins/dataTables/extensions/Buttons/js/buttons.print.min.js"></script>




    <!-- JQuery Validate -->
    <script type="text/javascript" src="/plugins/jquery-validate/jquery.validate.min.js"></script>

    <!-- Formatter -->
    <script type="text/javascript" src="/plugins/formatter/jquery.formatter.min.js"></script>
    <script type="text/javascript" src="/plugins/formatter/formatter.min.js"></script>

    <!-- Materialize -->
    <script src="/plugins/materialize/js/materialize.min.js"></script>

    <!-- AngularJS -->
    <script type="text/javascript" src="/plugins/angular/angular.min.js"></script>
    <script type="text/javascript" src="/plugins/angular-route/angular-route.min.js"></script>
    
    <!-- ui-mask files -->
    <script type="text/javascript" src="/plugins/angular-ui/mask.min.js"></script>

    <!-- Moment -->
    <script type="text/javascript" src="/plugins/moment/moment.min.js"></script>

    <!-- Serviços da aplicação -->
    <script type="text/javascript" src="/app/utils/StringUtils.js?<?php version('utils/StringUtils.js');?>"></script>
    <script type="text/javascript" src="/app/utils/DialogUtils.js?<?php version('utils/DialogUtils.js');?>"></script>
    <script type="text/javascript" src="/app/utils/SelectUtils.js?<?php version('utils/SelectUtils.js');?>"></script>
    <script type="text/javascript" src="/app/utils/TableUtils.js?<?php version('utils/TableUtils.js');?>"></script>
    <script type="text/javascript" src="/app/utils/ValidationUtils.js?<?php version('utils/ValidationUtils.js');?>"></script>
    <script type="text/javascript" src="/app/utils/DateUtils.js?<?php version('utils/DateUtils.js');?>"></script>
    <script type="text/javascript" src="/app/utils/ListaUtils.js?<?php version('utils/ListaUtils.js');?>"></script>

    <script type="text/javascript" src="/app/services/AuthService.js?<?php version('services/AuthService.js');?>"></script>
    <script type="text/javascript" src="/app/services/UsuarioService.js?<?php version('services/UsuarioService.js');?>"></script>
    <script type="text/javascript" src="/app/services/CursoService.js?<?php version('services/CursoService.js');?>"></script>
    <script type="text/javascript" src="/app/services/GrupoService.js?<?php version('services/GrupoService.js');?>"></script>
    <script type="text/javascript" src="/app/services/AtividadeService.js?<?php version('services/AtividadeService.js');?>"></script>
    <script type="text/javascript" src="/app/services/AvaliacaoService.js?<?php version('services/AvaliacaoService.js');?>"></script>
    <script type="text/javascript" src="/app/services/InscricaoService.js?<?php version('services/InscricaoService.js');?>"></script>
    <script type="text/javascript" src="/app/services/CalcularNotaService.js?<?php version('services/CalcularNotaService.js');?>"></script>

    <!--Controllers da aplicação-->
    <script type="text/javascript" src="/app/controllers/LoginController.js?<?php version('controllers/LoginController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/RecuperarSenhaController.js?<?php version('controllers/RecuperarSenhaController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/MenuController.js?<?php version('controllers/MenuController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/UsuarioController.js?<?php version('controllers/UsuarioController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/ListagemAtividadeController.js?<?php version('controllers/ListagemAtividadeController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/AtividadeController.js?<?php version('controllers/AtividadeController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/InscricaoController.js?<?php version('controllers/InscricaoController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/InscricoesController.js?<?php version('controllers/InscricoesController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/AvaliacaoController.js?<?php version('controllers/AvaliacaoController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/RelatorioController.js?<?php version('controllers/RelatorioController.js');?>"></script>
    <script type="text/javascript" src="/app/controllers/FundadoresController.js?<?php version('controllers/FundadoresController.js');?>"></script>

    <!--Configurações da aplicação-->
    <script type="text/javascript" src="/app/routes.js?<?php version('routes.js');?>"></script>
    <script type="text/javascript" src="/app/config.js?<?php version('config.js');?>"></script>
</body>

</html>

<?php
    function version($filename) {
        $raiz = dirname( __FILE__ );
        $file = "{$raiz}/app/{$filename}";
        
        if (file_exists($file)) {
            $version = filemtime($file);
            echo "v={$version}";
        } else {
            echo "Not found: {$file}";
        }
    }
?>
