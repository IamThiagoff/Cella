<?php
	include "../conexao.php";
	$sql = "SELECT tb_emprestimos.*, tb_produtos.*, tb_professores.*, casa.*
	FROM tb_emprestimos
	INNER JOIN tb_produtos ON tb_emprestimos.fk_produto = tb_produtos.id_produto
	INNER JOIN tb_professores ON tb_emprestimos.fk_professor=tb_professores.id_professor 
	INNER JOIN casa ON tb_professores.casa = casa.id_casa
	WHERE tb_emprestimos.retornavel = 1 AND tb_emprestimos.tipo_prod= 3";
	$emprestimo = $fusca->prepare($sql);
	$emprestimo->execute();
	
	$sql2 = "SELECT tb_historico_emp.*, tb_produtos.*, tb_professores.*, casa.* FROM tb_historico_emp INNER JOIN tb_produtos ON tb_historico_emp.fk_produto = tb_produtos.id_produto INNER JOIN tb_professores ON tb_historico_emp.fk_professor = tb_professores.id_professor INNER JOIN casa ON tb_professores.casa = casa.id_casa WHERE tb_historico_emp.tipo_prod = 3";
	$historico = $fusca->prepare($sql2);
	$historico->execute();
	
	$fusca = NULL;
?>
<html lang="pt-br">
	<head>
		<style>
			.glyphicon-duplicate{font-size:30px;color:#000;}
		</style>
		<script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/default.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="../alertifyjs/css/themes/bootstrap.min.css">
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Lista de empréstimos de notebooks</h2>
						<a href='relatorio_notebooks.php' id="left" style="width: 25px; height: 25px; position: relative; left:95%; top: -30px" data-toggle="tooltip" data-placement="bottom" title="Gerar Relatório de Empréstimo de Notebooks"><span aria-hidden="true" class="glyphicon glyphicon-duplicate"></span></a>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Produto</th>
									<th>Professor</th>
									<th>Casa</th>
									<th>Dia e Horário do empréstimo</th>
									<th>Dia e Horário Devolução</th>
									<th>Devolução</th>
								</tr>
							</thead>
							<tbody>
				
							
								<?php
									foreach($emprestimo as $emp){
										$id_emp = $emp['id_emprestimo'];
										$produto = $emp['nome'];
										$professor = $emp['nome_professor'];
										$casa = $emp['nome_casa'];
										$hora_emp  = $emp['data_hora_emprestimo'];
										$hora      = explode(" ",$hora_emp);
										// hora
										$horario      = explode(":",$hora[1]);
										$horario[0] = (int) $horario[0];
										$horario[0] = $horario[0]-3;
										//fim hora
										$data =	explode("-",$hora[0]);
										$dev  = $emp['data_hora_devolucao'];

										$devolucao = "<a id='devolver' href='#' aria-hidden='true' data-id='$id_emp' data-target='$produto' title='Marca devolução de $produto?' ><span style='width:30px; height:30px; color:red;' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";
	
										echo "<tr><td>$produto</td><td>$professor</td><td>$casa</td><td>$data[2]-$data[1]-$data[0] $horario[0]:$horario[1]:$horario[2]</td><td>-----</td><td>$devolucao</td></tr>";
									}
									foreach($historico as $hist){
										$id_hist = $hist['id_emprestimo'];
										$produto_hist = $hist['nome'];
										$professor_hist = $hist['nome_professor'];
										$hora_emp_hist  = $hist['data_hora_emprestimo'];
										$casa_hist = $hist['nome_casa'];
										$hora_hist_emp      = explode(" ",$hora_emp_hist);
										// hora
										$horario      = explode(":",$hora_hist_emp[1]);
										$horario[0] = (int) $horario[0];
										$horario[0] = $horario[0]-3;
										//fim hora
										$data_hist_emp =	explode("-",$hora_hist_emp[0]);
										$hora_dev_hist  = $hist['data_hora_devolucao'];
										$hora_hist_dev      = explode(" ",$hora_dev_hist);
										//hora devolucao
										$horario_dev      = explode(":",$hora_hist_dev[1]);
										$horario_dev[0] = (int) $horario_dev[0];
										$horario_dev[0] = $horario_dev[0]-3;
										
										//fim hora devolucao
										$data_dev_hist =	explode("-",$hora_hist_dev[0]);
										$devolvido = "<a href='#' title='Material devolvido' ><span style='width:30px; height:30px; color:green;' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";
										echo "<tr><td>$produto_hist</td><td>$professor_hist</td><td>$casa_hist</td><td>$data_hist_emp[2]-$data_hist_emp[1]-$data_hist_emp[0]/ $horario[0]:$horario[1]:$horario[2] </td><td>$data_dev_hist[2]-$data_dev_hist[1]-$data_dev_hist[0]/ $horario_dev[0]:$horario_dev[1]:$horario_dev[2] </td><td>$devolvido</td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
				  <!-- /#page-wrapper -->
		 <!-- /#wrapper -->

		<!-- jQuery -->
		<!--<script src="../bootstrap/vendor/jquery/jquery.min.js"></script> -->

		<!-- Bootstrap Core JavaScript -->
	   <!-- <script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>-->

		<!-- Metis Menu Plugin JavaScript -->
		<script src="../bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="../bootstrap/vendor/datatables/js/jquery.dataTables.js"></script>
		<script src="../bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>

		<!-- Custom Th e JavaScript -->
		<script src="../bootstrap/dist/js/sb-admin-2.js"></script>
		<script>
		$(function(){
			$('#right').tooltip();
			$("#left").tooltip({
				placement: "left",
				title: "tooltip on left"
			});
		});
		</script>
	<script>
		$("a#devolver").click(function(){
			var id = $(this).attr("data-id");
			var nome = $(this).attr("data-target");
			alertify.confirm('Completar devolução de '+ nome+' ?').set('onok', function(closeEvent)
				{
				$.ajax({
				   url: 'devolucao.php',
				   type: 'POST',
				   data: {id_dev: id},
				   error: function() {
					  alert('Something is wrong');
				   },
				   success: function(data) {
						$("#"+id).remove(); 
						 location.reload();
				   }
				});
			} );
		});
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>
	</body>
</html>
