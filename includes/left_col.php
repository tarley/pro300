<?php
	$nome = $_SESSION['nome'];
	$perfil = $_SESSION['perfil'];
?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="clearfix"></div>

		<!-- menu prile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="images/logo_mini.jpg" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Bem vindo,</span>
				<h2><?php echo $nome; ?></h2>
			</div>
		</div>
		<!-- /menu prile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

			<div class="menu_section">

				<ul class="nav side-menu">
					<li class="active">
						<a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="">
							<?php if($perfil == "P"): ?>
							<li><a href="administrarAtividades.php">Administrar Atividades</a></li>
							<li><a href="lancamentoNota.php">Lançamento Nota</a></li>
							<li><a href="cadastroProfessor.php">Cadastro Professor</a></li>
				<!--li><a href="gestaoGrupos.php">Gestão Grupos</a></li-->
                                <!--<li><a href="gestaoGruposFiltroAtividade.php">Filtro Atividade</a></li>-->
							<li><a href="parametroAvaliacao.php">Parâmetro Avaliação</a></li>
							<li><a href="cadastroAvaliacao.php">Cadastro Avaliação</a></li>
							<li><a href="relatorioAtividades.php">Relatório Atividade</a></li>
                                <!--<li><a href="telaFinal.php">Tela Final</a></li>-->
							<?php elseif($perfil == "A"): ?>
							<li><a href="listarAtividades.php">Atividades</a></li>
							<li><a href="avaliacaoAjudado.php">Avaliação Ajudado</a></li>
							<li><a href="avaliacaoLider.php">Avaliação Líder</a></li>
							<!--<li><a href="login.php#toregister">Cadastro Aluno</a></li>-->
							<li><a href="editarAluno.php">Editar Cadastro</a></li>
							<li><a href="inscricaoAvaliacao.php">Incrição Avaliação</a></li>
							<?php endif; ?>
						</ul>
					</li>
				</ul>

			</div>
		</div>
		<!-- /sidebar menu -->
	</div>
</div>
